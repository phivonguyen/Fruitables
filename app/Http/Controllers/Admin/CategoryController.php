<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
    public function store()
    {
        Category::create(request()->all());
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

        $category->update($request->all());

        return redirect()->route("category/index")->with("success", "Update category successfully");
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if ($category != null) {
            $category->delete();
            return redirect()->route("category/index")->with("success", "Delete category successfully");
        }
    }
}
