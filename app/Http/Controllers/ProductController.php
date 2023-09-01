<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with('brand', 'category')->get();
        $brand = Brand::all();
        $category = Category::all();

        return view('/product')->with([
            'product' =>$product,
            'category' => $category,
            'brand' => $brand
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $name = $request->file('image')->getClientOriginalName();

        $path = $request->file('image')->store('public/images');

        $product = new Product;
        $product->name = $request->name;
        $product->image = $path;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->save();

        return response()->json(['message' => 'Product added successfully']);
    }

    public function destroy($id)
    {

        $product = Product::find($id);
        $product->delete();

        return redirect()->back();
    }
}
