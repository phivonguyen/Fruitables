<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('./uploads', 'public');

            $imageName = basename($imagePath);

            $requestData = array_merge($request->all(), ['image' => $imageName]);
        } else {
            $requestData = array_merge($request->all(), ['image' => 'default.jpg']);
        }
        Product::create($requestData);

        return redirect()->route("product/index")->with("success", "Add product successfully");
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product != null) {
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
            $imagePath = $request->file('image')->store('./uploads', 'public');
            $imageName = basename($imagePath);

            if ($product->image !== 'default.jpg') {
                Storage::disk('public')->delete('uploads/' . $product->image);
            }

            $requestData = array_merge($request->all(), ['image' => $imageName]);
        } else {
            $requestData = $request->all();
        }
        $product->update($requestData);

        return redirect()->route("product/index")->with("success", "Update product successfully");
    }
}
