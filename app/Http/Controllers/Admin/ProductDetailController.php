<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\ProductDetail;
use App\Models\Category;

class ProductDetailController extends Controller
{
    public function index()
    {
        $product_details = ProductDetail::all();
        return view("admin/product_detail/index", compact("product_details"));
    }
    public function create()
    {
        $categories = Category::all();
        return view("admin/product_detail/create", compact("categories"));
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
        ProductDetail::create($requestData);

        return redirect()->route("admin/product_detail/index")->with("success", "Add product successfully");
    }

    public function delete($id)
    {
        $product_details = ProductDetail::find($id);
        if ($product_details != null) {
            $product_details->delete();
            return redirect()->route("admin/product_detail/index")->with("success", "Delete product successfully");
        }
    }

    public function edit($id)
    {
        $product_detail = ProductDetail::find($id); // Sửa tên biến ở đây
        $categories = Category::all();

        return view("admin/product_detail/edit", compact("product_detail", "categories"));
    }
    public function update(Request $request, $id)
    {
        $product_detail = ProductDetail::find($id);

        if (!$product_detail) {
            return redirect()->route("admin/product_detail/index")->with("error", "Product not found");
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('./uploads', 'public');
            $imageName = basename($imagePath);

            if ($product_detail->image !== 'default.jpg') {
                Storage::disk('public')->delete('uploads/' . $product_detail->image);
            }

            $requestData = array_merge($request->all(), ['image' => $imageName]);
        } else {
            $requestData = $request->all();
        }
        $product_detail->update($requestData);

        return redirect()->route("admin/product_detail.index")->with("success", "Add product successfully");
    }
}
