<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

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
            $data['product_name'] = $request->product_name;
            $data['product_code'] = $request->product_code;
            $data['product_quantity'] = $request->product_quantity;
            $data['category_id'] = $request->category_id;
            $data['subcategory_id'] = $request->subcategory_id;
            $data['brand_id'] = $request->brand_id;
            $data['product_size'] = $request->product_size;
            $data['product_color'] = $request->product_color;
            $data['selling_price'] = $request->selling_price;
            $data['product_details'] = $request->product_details;
            $data['video_link'] = $request->video_link;
            $data['status'] = $request->status;
            $data['main_slider'] = $request->main_slider;
            $data['hot_deal'] = $request->hot_deal;
            $data['best_rated'] = $request->best_rated;
            $data['mid_slider'] = $request->mid_slider;
            $data['hot_new'] = $request->hot_new;
            $data['trend'] = $request->trend;

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        if ($image_one && $image_two) {
            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalName();
            Image::make($image_one)->resize(300, 300)->save('public/media/product/'.$image_one_name);
            $data['image_one'] = 'public/media/product/'.$image_one_name;

            $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalName();
            Image::make($image_two)->resize(300, 300)->save('public/media/product/'.$image_two_name);
            $data['image_two'] = 'public/media/product/'.$image_two_name;

            $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalName();
            Image::make($image_three)->resize(300, 300)->save('public/media/product/'.$image_three_name);
            $data['image_three'] = 'public/media/product/'.$image_three_name;

            DB::table('products')->insert($data);
            return redirect()->back()->with('success', 'Product Inserted Successfully!');
        }

        //DB::table('products')->insert($requestData);

        return redirect()->back()->with('success', 'Product Inserted Successfully!');
    }

    public function getSubcategory($category_id) {
        $subCategory = DB::table('sub_categories')->where('category_id', $category_id)->get();

        return json_encode($subCategory);
    }
}
