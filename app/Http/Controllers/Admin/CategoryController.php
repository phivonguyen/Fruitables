<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view("admin.category.index", compact("categories"));

    }

    public function create()
    {
        return view("admin.category.create");
    }
    public function store(Request $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $uploadedImages = [];

            foreach ($request->file('image') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $uploadedImages[] = $imageName;
            }
            $requestData['image'] = json_encode($uploadedImages);
        } else {
            $requestData['image'] = 'default.jpg';
        }

        Category::create($requestData);
        return redirect()->route("category/index")->with("success", "Add category successfully");
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route("category/index")->with("error", "Category not found");
        }

        return view("admin.category.edit", compact("category"));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route("category/index")->with("error", "Category not found");
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $oldImages = json_decode($category->image, true);
            foreach ($oldImages as $oldImage) {
                $imagePath = public_path('uploads') . '/' . $oldImage;
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
            $uploadedImages = [];
            foreach ($request->file('image') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $uploadedImages[] = $imageName;
            }
            $requestData = array_merge($request->all(), ['image' => json_encode($uploadedImages)]);
        } else {
            $requestData = $request->all();
        }
        $category->update($requestData);

        return redirect()->route("category/index")->with("success", "Update category successfully");
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if ($category != null) {
            $oldImages = json_decode($category->image, true);
            foreach ($oldImages as $oldImage) {
                $imagePath = public_path('uploads') . '/' . $oldImage;
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
            $category->delete();
            return redirect()->route("category/index")->with("success", "Delete category successfully");
        }
    }
}
