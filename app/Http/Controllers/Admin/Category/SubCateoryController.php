<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCateoryController extends Controller
{
    public function subCategory() {
        return view('admin.sub_category.sub_category');
    }
}
