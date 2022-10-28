<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostCategoryController extends Controller
{
    public function postCategories() {
        $postCategories = DB::table('post_categories')->get();

        return view('admin.post_category.all_post_category', compact('postCategories'));
    }
}
