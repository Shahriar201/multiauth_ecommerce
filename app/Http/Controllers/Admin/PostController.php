<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Image;

class PostController extends Controller
{
    public function getAllPost() {
        $posts = DB::table('posts')
                ->join('post_categories', 'posts.post_category_id', 'post_categories.id')
                ->select('posts.*', 'post_categories.post_category_name_en')
                ->get();

        return view('admin.post_category.post.all_post', compact('posts'));
    }

    public function postAdd() {
        $categories = DB::table('post_categories')->where('status', 1)->get();

        return view('admin.post_category.post.add_post', compact('categories'));
    }

    public function postStore(Request $request) {
        $validator = Validator::make($request->all(),[
            'post_category_id' => 'required|exists:post_categories,id',
            'post_title_en' => 'required',
            'post_title_bn' => 'required',
            'post_details_en' => 'required',
            'post_details_bn' => 'required',
            'status'           => 'required',
            'post_image'           => 'required',
        ],[
            'post_category_id.required' => 'Post Category Name is required',
            'post_title_en.required'    => 'Post Title English field is required',
            'post_title_bn.required'    => 'Post Title Bangla field is required',
            'post_details_en.required'  => 'Post Details English field is required',
            'post_details_bn.required'  => 'Post Details Bangla field is required',
            'status.required'           => 'Status field is required',
            'post_image.required'       => 'Post Image field is required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data['post_category_id'] = $request->post_category_id;
            $data['post_title_en']    = $request->post_title_en;
            $data['post_title_bn']    = $request->post_title_bn;
            $data['post_details_en']  = $request->post_details_en;
            $data['post_details_bn']  = $request->post_details_bn;
            $data['status']           = $request->status;
            $data['created_by']       = auth()->user()->id;

            if ($request->post_image) {
                $post_image_name = hexdec(uniqid()).'.'.$request->post_image->getClientOriginalName();
                Image::make($request->post_image)->resize(300, 300)->save('public/media/post_images/'.$post_image_name);
                $data['post_image'] = 'public/media/post_images/'.$post_image_name;

                DB::table('posts')->insert($data);

                return redirect()->route('get.all.post')->with('success', 'Post Inserted Successfully!');
            }

        return redirect()->back()->with('success', 'Product Inserted Fail!');

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function postEdit($id) {
        dd('Ok');
    }
}
