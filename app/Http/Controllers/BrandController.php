<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::all();

        return view('/brand')->with(['brand' =>$brand]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->save();

        return redirect('/brand')->with('success', 'Brand added successfully');
    }

    public function destroy($id)
    {

        $category = Brand::find($id);
        $category->delete();

        return redirect()->back();
    }
}


