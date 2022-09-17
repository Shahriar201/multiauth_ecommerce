<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function brand() {
        $brands = Brand::all();

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
            $image = $request->file('brand_logo');
            if ($image) {
                $imageName = date('dmy_H_s_i');
                $ext = strtolower($image->getClientOriginalName());
                $imageFullName = $imageName.'.'.$ext;
                $uploadPath = 'public/media/brand/';
                $imageURL = $uploadPath.$imageFullName;
                $image->move($uploadPath, $imageFullName);
                $brand['brand_logo'] = $imageURL;
            }
            $brand->save();

            return redirect()->route('brand')->with('success', 'Brand Created Successfully!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function editBrand($id) {
        $brand = DB::table('brands')->where('id', $id)->first();

        return view('admin.brand.edit_brand', compact('brand'));
    }

    public function updateBrand(Request $request, $id) {
        try {
            $oldLogo = $request->old_logo;

            $brand = Brand::findOrFail($id);
            $brand->brand_name = $request->brand_name;
            $brand->status = $request->status;
            $brand->updated_by = auth()->user()->id;
            $image = $request->file('brand_logo');
            if ($image) {
                unlink($oldLogo);
                $imageName = date('dmy_H_s_i');
                $ext = strtolower($image->getClientOriginalName());
                $imageFullName = $imageName.'.'.$ext;
                $uploadPath = 'public/media/brand/';
                $imageURL = $uploadPath.$imageFullName;
                $image->move($uploadPath, $imageFullName);
                $brand['brand_logo'] = $imageURL;
            }
            $brand->save();

            return redirect()->route('brand')->with('success', 'Brand Updated Successfully!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteBrand(Request $request, $id) {
        $brand = Brand::findOrFail($id);
        $image = $brand->brand_logo;
        unlink($image);
        $brand->delete();

        return redirect()->back()->with('success', 'Brand Deleted Successfully!');
    }
}
