<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productAll() {
        dd('Ok');
    }

    public function productAdd() {
        return view('admin.product.add_product');
    }
}
