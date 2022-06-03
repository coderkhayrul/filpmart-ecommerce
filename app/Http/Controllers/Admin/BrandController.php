<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::where('brand_status', 1)->get();
        return view('admin.pages.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'brand_name' => 'required',
        ]);

        if ($request->hasFile('brand_image')) {
            $brand_image = $request->file('brand_image');
            $brand_image_name = time() . '_' . rand(100000, 10000000) . '.' . $brand_image->getClientOriginalExtension();
            Image::make($brand_image)->resize(120, 120)->save('backend/uploads/brand/' . $brand_image_name);
        }else{
            $brand_image_name = '';
        }

        if ($request->brand_feature == 'on') {
            $brand_feature = 1;
        }else{
            $brand_feature = 0;
        }

        $brand = Brand::create([
            'brand_name' => $request->brand_name,
            'brand_slug' => Str::slug($request->brand_name, '-'),
            'brand_remarks' => $request->brand_remarks,
            'brand_creator' => Auth::user()->id,
            'brand_feature' => $brand_feature,
            'brand_image' => $brand_image_name,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($brand) {
            Session::flash('success', 'Brand Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Brand Created Failed');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $brand = Brand::where('brand_status', 1)->where('brand_slug', $slug)->firstOrFail();
        return view('admin.pages.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'brand_name' => 'required',
        ]);
        $brand = Brand::where('brand_status', 1)->where('brand_slug', $slug)->firstOrFail();
        if ($request->hasFile('brand_image')) {
            if (File::exists('backend/uploads/brand/'.$brand->brand_image)) {
                File::delete('backend/uploads/brand/'.$brand->brand_image);
            }
            $brand_image = $request->file('brand_image');
            $brand_image_name = time() . '_' . rand(100000, 10000000) . '.' . $brand_image->getClientOriginalExtension();
            Image::make($brand_image)->resize(120, 120)->save('backend/uploads/brand/' . $brand_image_name);
        }else{
            $brand_image_name = $brand->brand_image;
        }

        if ($request->brand_feature == 'on') {
            $brand_feature = 1;
        }else{
            $brand_feature = 0;
        }

        $brand = Brand::where('brand_status', 1)->where('brand_slug', $slug)->update([
            'brand_name' => $request->brand_name,
            'brand_slug' => Str::slug($request->brand_name, '-'),
            'brand_remarks' => $request->brand_remarks,
            'brand_editor' => Auth::user()->id,
            'brand_feature' => $brand_feature,
            'brand_image' => $brand_image_name,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($brand) {
            Session::flash('success', 'Brand Update successfully');
            return redirect()->route('brand.index');
        } else {
            Session::flash('error', 'Brand Update Failed');
            return redirect()->route('brand.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softdelete($slug)
    {
        $brand = Brand::where('brand_status', 1)->where('brand_slug', $slug)->update([
            'brand_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($brand) {
            Session::flash('success', "Brand Delete Successfully!");
            return redirect()->route('brand.index');
        }else{
            Session::flash('error', "Brand Delete Failed!");
            return redirect()->route('brand.index');
        }
    }
}
