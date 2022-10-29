<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function getAllPost() {
        $posts = DB::table('posts')->get();

        return view('admin.post_category.post.all_post', compact('posts'));
    }
}
