<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function coupons() {
        $coupons = DB::table('coupons')->where('status', 1)->get();

        return view('admin.coupon.coupons', compact('coupons'));
    }
}
