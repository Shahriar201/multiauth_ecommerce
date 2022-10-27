<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Image;

class ProductController extends Controller
{
    public function productAll() {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name')
            ->get();

        return view('admin.product.all_products', compact('products'));
    }

    public function productAdd() {
        $categories = DB::table('categories')->where('status', 1)->get();
        $brands = DB::table('brands')->where('status', 1)->get();

        return view('admin.product.add_product', compact('categories', 'brands'));
    }

    public function productStore(Request $request) {
        $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'product_quantity' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'image_one' => 'required',
            'image_two' => 'required',
            'image_three' => 'required',
            'status' => 'required',
        ]);

        try {
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
            $data['created_at'] = \Carbon\Carbon::now();

            $image_one = $request->image_one;
            $image_two = $request->image_two;
            $image_three = $request->image_three;

            // image store using laravel image intervention
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

            return redirect()->back()->with('success', 'Product Inserted Fail!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getSubcategory($category_id) {
        $subCategory = DB::table('sub_categories')->where('category_id', $category_id)->get();

        return json_encode($subCategory);
    }

    public function inActiveProduct($id) {
        DB::table('products')->where('id', $id)->update(['status' => 0]);

        return redirect()->back()->with('success', 'Product Inctive Successfully!');
    }

    public function activeProduct($id) {
        DB::table('products')->where('id', $id)->update(['status' => 1]);

        return redirect()->back()->with('success', 'Product Active Successfully!');
    }

    public function deleteProduct($id) {
        $product = DB::table('products')->where('id', $id)->first();

        $image_one = $product->image_one;
        $image_two = $product->image_two;
        $image_three = $product->image_three;

        unlink($image_one);
        unlink($image_two);
        unlink($image_three);

        $product = DB::table('products')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }

    public function editProduct($id) {
        $editProduct = DB::table('products')->where('id', $id)->first();
        $categories = DB::table('categories')->where('status', 1)->get();
        $subCategories = DB::table('sub_categories')->where('status', 1)->get();
        $brands = DB::table('brands')->where('status', 1)->get();

        return view('admin.product.edit_product', compact('editProduct', 'brands', 'categories', 'subCategories'));
    }

    public function updateProductWithoutImage(Request $request, $id) {
        $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'product_quantity' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'status' => 'required',
        ]);

        try {
            $data = array();
            $data['product_name'] = $request->product_name;
            $data['product_code'] = $request->product_code;
            $data['product_quantity'] = $request->product_quantity;
            $data['discount_price'] = $request->discount_price;
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
            $data['updated_at'] = \Carbon\Carbon::now();

            $productUpdate = DB::table('products')->where('id', $id)->update($data);
            if ($productUpdate) {
                return redirect()->route('all.product')->with('success', 'Product Updated Successfully!');
            } else {
                return redirect()->route('all.product')->with('success', 'Nothing To Update!');
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateProductWithImage(Request $request, $id) {
        // $validator = Validator::make($request->all(),[
        //     'image_one' => 'required',
        //     'image_two' => 'required',
        //     'image_three' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->with('error', 'Validation Error');
        // }

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        $old_one = $request->old_one;
        $old_two = $request->old_two;
        $old_three = $request->old_three;

        $data = array();

        if ($request->has('image_one')) {
            unlink($old_one);

            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalName();
            Image::make($image_one)->resize(300, 300)->save('public/media/product/'.$image_one_name);
            $data['image_one'] = 'public/media/product/'.$image_one_name;

            DB::table('products')->where('id', $id)->update($data);

            return redirect()->route('all.product')->with('success', 'Image One Update!');

        }

        if ($request->has('image_two')) {
            unlink($old_two);

            $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalName();
            Image::make($image_two)->resize(300, 300)->save('public/media/product/'.$image_two_name);
            $data['image_two'] = 'public/media/product/'.$image_two_name;

            DB::table('products')->where('id', $id)->update($data);

            return redirect()->route('all.product')->with('success', 'Image Two Update!');

        }

       if ($request->has('image_three')) {
            unlink($old_three);

            $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalName();
            Image::make($image_three)->resize(300, 300)->save('public/media/product/'.$image_three_name);
            $data['image_three'] = 'public/media/product/'.$image_three_name;

            DB::table('products')->where('id', $id)->update($data);

            return redirect()->route('all.product')->with('success', 'Image Three Update!');

        }

        if ($request->has('image_one') && $request->has('image_two')) {
            unlink($old_one);
            unlink($old_two);
            unlink($old_three);

            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalName();
            Image::make($image_one)->resize(300, 300)->save('public/media/product/'.$image_one_name);
            $data['image_one'] = 'public/media/product/'.$image_one_name;

            $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalName();
            Image::make($image_two)->resize(300, 300)->save('public/media/product/'.$image_two_name);
            $data['image_two'] = 'public/media/product/'.$image_two_name;

            DB::table('products')->where('id', $id)->update($data);

            return redirect()->route('all.product')->with('success', 'Image One and Two Are Update!');

        }

        if ($request->has('image_one') && $request->has('image_two') && $request->has('image_three')) {
            unlink($old_one);
            unlink($old_two);
            unlink($old_three);

            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalName();
            Image::make($image_one)->resize(300, 300)->save('public/media/product/'.$image_one_name);
            $data['image_one'] = 'public/media/product/'.$image_one_name;

            $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalName();
            Image::make($image_two)->resize(300, 300)->save('public/media/product/'.$image_two_name);
            $data['image_two'] = 'public/media/product/'.$image_two_name;

            $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalName();
            Image::make($image_three)->resize(300, 300)->save('public/media/product/'.$image_three_name);
            $data['image_three'] = 'public/media/product/'.$image_three_name;

            DB::table('products')->where('id', $id)->update($data);

            return redirect()->route('all.product')->with('success', 'All Images Are Update!');

        }
        else {
            return redirect()->route('all.product')->with('success', 'Images Are Not Update!');
        }
    }
}
