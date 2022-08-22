<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function category() {
        $categories = Category::all();

        return view('admin.category.category', compact('categories'));
    }

    public function storeCategory (Request $request) {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories,category_name',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->status = $request->status;
        $category->save();

        return redirect()->back()->with('success', 'Category Created Successfully!');
    }
}
