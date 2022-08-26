<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function brand() {
        $brands = Brand::where('status', 1)->get();

        return view('admin.brand.brand', compact('brands'));
    }

    public function storeBrand(Request $request) {
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands,brand_name',
            'status' => 'required'
        ]);

        try {
            $brand = new Brand();
            $brand->brand_name = $request->brand_name;
            $brand->status = $request->status;
            $brand->created_by = auth()->user()->id;
            if($request->file('brand_logo')) {
                $file = $request->file('brand_logo');
                $fileName = date('Y-m-d-H-i').$file->getClientOriginalName();
                $file->move(public_path().'/upload/category/brand_logo/', $fileName);
                $brand['brand_logo'] = $fileName;
            }
            $brand->save();

            return redirect()->route('brand')->with('success', 'Brand Created Successfully!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
