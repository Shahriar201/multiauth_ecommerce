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

        try {
            $category = new Category();
            $category->category_name = $request->category_name;
            $category->status = $request->status;
            $category->created_by = auth()->user()->id;
            $category->save();

            return redirect()->back()->with('success', 'Category Created Successfully!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateCategory(Request $request) {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories,category_name,'.$request->id,
        ]);

        try {
            Category::findOrFail($request->id)->update([
                'category_name' => $request->category_name,
                'status'        => $request->status,
                'updated_by'    => auth()->user()->id,
            ]);

            return redirect()->back()->with('success', 'Category Updated Successfully!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteCategory($id) {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category Deleted Successfully!');
    }
}
