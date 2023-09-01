<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();

        return view('/category')->with(['category' =>$category]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        if ($request->name !== null) 
        {
            $category = new Category;
            $category->name = $request->name;
            $category->save();

            return redirect('/dashboard')->with('success', 'Category added successfully');
        } else {
            return redirect()->back()->with('error', 'please fill the form');
        }
        
        
    }

    public function destroy($id)
    {

        $category = Category::find($id);
        $category->delete();

        return redirect()->back();
    }
}
