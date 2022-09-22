<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function productAll() {
        dd('Ok');
    }

    public function productAdd() {
        $categories = DB::table('categories')->where('status', 1)->get();
        $brands = DB::table('brands')->where('status', 1)->get();

        return view('admin.product.add_product', compact('categories', 'brands'));
    }

    public function getSubcategory($category_id) {
        $subCategory = DB::table('sub_categories')->where('category_id', $category_id)->get();

        return json_encode($subCategory);
    }
}
