<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function coupons() {
        $coupons = DB::table('coupons')->get();

        return view('admin.coupon.coupons', compact('coupons'));
    }

    public function storeCoupon(Request $request) {
        $request->validate([
            'coupon' => 'required',
            'discount' => 'required',
            'status' => 'required|min:0|max:1',
        ]);

        try {
            $requestData = [
                'coupon' => $request->coupon,
                'discount' => $request->discount,
                'status' => $request->status,
            ];

            DB::table('coupons')->insert($requestData);

            return redirect()->back()->with('success', 'Coupon Created Successfully!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function editCoupon($id) {
        $coupon = DB::table('coupons')->where('id', $id)->first();

        return view('admin.coupon.edit_coupon', compact('coupon'));
    }

    public function updateCoupon(Request $request, $id) {
        $request->validate([
            'coupon' => 'required',
            'discount' => 'required',
            'status' => 'required|min:0|max:1',
        ]);

        try {
            $requestData = [
                'coupon' => $request->coupon,
                'discount' => $request->discount,
                'status' => $request->status,
            ];

            DB::table('coupons')->where('id', $id)->update($requestData);

            return redirect()->route('coupons')->with('success', 'Coupon Updated Successfully!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteCoupon($id) {
        DB::table('coupons')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Coupon Deleted Successfully!');
    }
}
