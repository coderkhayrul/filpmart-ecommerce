<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $request->all();
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
        //
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
        //
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
        //
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
