<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostCategoryController extends Controller
{
    public function postCategories() {
        $postCategories = DB::table('post_categories')->get();

        return view('admin.post_category.all_post_category', compact('postCategories'));
    }

    public function postCategoryStore(Request $request) {

        $validator = Validator::make($request->all(),[
            'post_category_name_en' => 'required',
            'post_category_name_bn' => 'required',
            'status'           => 'required',
        ],[
            'post_category_name_en.required' => 'Category Name English field is required',
            'post_category_name_bn.required' => 'Category Name Bangla field is required',
            'status.required'           => 'Status field is required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $requestData = [
                'post_category_name_en' => $request->post_category_name_en,
                'post_category_name_bn' => $request->post_category_name_bn,
                'status'                => $request->status,
                'created_by'            => auth()->user()->id,
                'created_at'            => now()
            ];

            DB::table('post_categories')->insert($requestData);

            return redirect()->back()->with('success', 'Post Category Created Successfully!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
