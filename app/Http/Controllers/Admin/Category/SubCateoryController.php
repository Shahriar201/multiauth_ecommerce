<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCateoryController extends Controller
{
    public function subCategory() {
        $categories = DB::table('categories')->where('status', 1)->get();
        $subCategories = DB::table('sub_categories')
                        ->join('categories', 'sub_categories.category_id', 'categories.id')
                        ->select('sub_categories.*', 'categories.category_name')
                        ->get();

        return view('admin.sub_category.sub_category', compact('categories', 'subCategories'));
    }

    public function storeSubCategory(Request $request) {
        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories,subcategory_name',
            'category_id'      => 'required',
            'status'           => 'required'
        ]);

        $subCategory = new SubCategory();
        $subCategory->subcategory_name = $request->subcategory_name;
        $subCategory->category_id = $request->category_id;
        $subCategory->status = $request->status;
        $subCategory->created_by = auth()->user()->id;
        $subCategory->save();

        return redirect()->back()->with('success', 'Sub-Category Created Successfully!');
    }

    public function editSubCategory($id) {
        $categories = DB::table('categories')->where('status', 1)->get();
        $subCategory = DB::table('sub_categories')->where('id', $id)->first();

        return view('admin.sub_category.edit_sub_category', compact('categories', 'subCategory'));
    }

    public function updateSubCategory(Request $request, $id) {
        $subCategory = SubCategory::findOrFail($id);

        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories,subcategory_name,'.$subCategory->id,
            'category_id'      => 'required',
            'status'           => 'required'
        ]);

        $subCategory->subcategory_name = $request->subcategory_name;
        $subCategory->category_id = $request->category_id;
        $subCategory->status = $request->status;
        $subCategory->updated_by = auth()->user()->id;
        $subCategory->save();

        return redirect()->route('subCategory')->with('success', 'Sub-Category Updated Successfully!');
    }
}
