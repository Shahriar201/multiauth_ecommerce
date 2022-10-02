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

    public function productStore(Request $request) {
        $requestData = [
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'product_quantity' => $request->product_quantity,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'brand_id' => $request->brand_id,
            'product_size' => $request->product_size,
            'selling_price' => $request->selling_price,
            'product_details' => $request->product_details,
            'video_link' => $request->video_link,
            'status' => $request->status,
            'main_slider' => $request->main_slider,
            'hot_deal' => $request->hot_deal,
            'best_rated' => $request->best_rated,
            'mid_slider' => $request->mid_slider,
            'hot_new' => $request->hot_new,
            'trend' => $request->trend,
        ];

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        if ($image_one && $image_two) {
            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalName();
            $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalName();
            $uploadPath = 'public/media/product/';

            $image_one->move($uploadPath, $image_one_name);
            $image_two->move($uploadPath, $image_two_name);

            $product['image_one'] = $image_one_name;
            $product['image_two'] = $image_two_name;
        }

        DB::table('products')->insert($requestData);

        return response()->back()->with('success', 'Product Inserted Successfully!');
    }

    public function getSubcategory($category_id) {
        $subCategory = DB::table('sub_categories')->where('category_id', $category_id)->get();

        return json_encode($subCategory);
    }
}
