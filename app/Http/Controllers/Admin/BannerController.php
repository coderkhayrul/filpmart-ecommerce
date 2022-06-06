<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::where('banner_status', 1)->get();
        return view('admin.pages.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.banner.create');
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
            'banner_title' => 'required',
            'banner_mid_title' => 'required',
            'banner_subtitle' => 'required',
            'banner_title' => 'required',
            'banner_order' => 'required',
        ]);

        if ($request->hasFile('banner_image')) {
            $banner_image = $request->file('banner_image');
            $banner_image_name = time() . '_' . rand(100000, 10000000) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(870, 370)->save('backend/uploads/banner/' . $banner_image_name);
        }

        $banner = Banner::create([
            'banner_title' => $request->banner_title,
            'banner_mid_title' => $request->banner_mid_title,
            'banner_subtitle' => $request->banner_subtitle,
            'banner_button' => $request->banner_button,
            'banner_url' => $request->banner_url,
            'banner_order' => $request->banner_order,
            'banner_publish' => Auth::user()->id,
            'banner_creator' => Auth::user()->id,
            'banner_slug' => Str::slug($request->banner_title, '-'),
            'banner_status' => 1,
            'banner_image' => $banner_image_name,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($banner) {
            Session::flash('success', 'Banner Create successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Banner Created Failed');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = Banner::where('banner_slug', $slug)->where('banner_status', 1)->first();
        return view('admin.pages.banner.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'banner_title' => 'required',
            'banner_mid_title' => 'required',
            'banner_subtitle' => 'required',
            'banner_title' => 'required',
            'banner_order' => 'required',
        ]);
        $banner = Banner::where('banner_status', 1)->where('banner_slug', $slug)->firstOrFail();
        if ($request->hasFile('banner_image')) {
            if (File::exists('backend/uploads/banner/'.$banner->banner_image)) {
                File::delete('backend/uploads/banner/'.$banner->banner_image);
            }
            $banner_image = $request->file('banner_image');
            $banner_image_name = time() . '_' . rand(100000, 10000000) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(870, 370)->save('backend/uploads/banner/' . $banner_image_name);
        }else{

            $banner_image_name = $banner->banner_image;
        }

        $banner = Banner::where('banner_status', 1)->where('banner_slug', $slug)->update([
            'banner_title' => $request->banner_title,
            'banner_mid_title' => $request->banner_mid_title,
            'banner_subtitle' => $request->banner_subtitle,
            'banner_button' => $request->banner_button,
            'banner_url' => $request->banner_url,
            'banner_order' => $request->banner_order,
            'banner_editor' => Auth::user()->id,
            'banner_slug' => Str::slug($request->banner_title, '-'),
            'banner_image' => $banner_image_name,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($banner) {
            Session::flash('success', 'Banner Update successfully');
            return redirect()->route('banner.index');
        } else {
            Session::flash('error', 'Banner Update Failed');
            return redirect()->route('banner.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function softdelete(Request $request, $slug)
    {
        $banner = Banner::where('banner_slug', $slug)->where('banner_status', 1)->update([
            'banner_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($banner) {
            Session::flash('success', "Banner Delete Successfully!");
            return redirect()->route('banner.index');
        }else{
            Session::flash('error', "Banner Delete Failed!");
            return redirect()->route('banner.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
    }
}
