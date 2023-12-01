<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("admin.product.index", compact("products"));
    }

    public function create()
    {
        $categories = Category::all();
        return view("admin.product.create", compact("categories"));
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

        Product::create($requestData);

        return redirect()->route("product/index")->with("success", "Add product successfully");
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if ($product != null) {
            $oldImages = json_decode($product->image, true);
            foreach ($oldImages as $oldImage) {
                $imagePath = public_path('uploads') . '/' . $oldImage;
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $product->delete();
            return redirect()->route("product/index")->with("success", "Delete product successfully");
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view("admin.product.edit", compact("product", "categories"));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route("admin/product/index")->with("error", "Product not found");
        }

        if ($request->hasFile('image')) {
            $oldImages = json_decode($product->image, true);
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

        $product->update($requestData);

        return redirect()->route("product/index")->with("success", "Update product successfully");
    }
}
