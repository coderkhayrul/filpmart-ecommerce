<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BasicInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class ManageController extends Controller
{
    // Basic Info
    public function basic_index(){
        $data = BasicInfo::where('basic_id', 1)->firstOrFail();
        return view('admin.settings.basic_info', compact('data'));
    }

    public function basic_update(Request $request){

        $data = BasicInfo::where('basic_id', $request->basic_id)->where('basic_status', 1)->firstOrFail();

        // Basic Header Logo
        if ($request->hasFile('basic_header_logo')) {
            $header_logo = $request->file('basic_header_logo');
            $headerName = time() . '_' . rand(100000, 10000000) . '.' . $header_logo->getClientOriginalExtension();
            Image::make($header_logo)->resize(140, 40)->save('backend/uploads/setting/' . $headerName);
        } else {
            $headerName = $data->basic_header_logo;
        }

        // Basic Footer Logo
        if ($request->hasFile('basic_footer_logo')) {
            $footer_logo = $request->file('basic_footer_logo');
            $footerName = time() . '_' . rand(100000, 10000000) . '.' . $header_logo->getClientOriginalExtension();
            Image::make($footer_logo)->resize(140, 40)->save('backend/uploads/setting/' . $footerName);
        } else {
            $footerName = $data->basic_footer_logo;
        }

        // Basic Favicon Logo
        if ($request->hasFile('basic_favicon')) {
            $favicon_logo = $request->file('basic_favicon');
            $faviconName = time() . '_' . rand(100000, 10000000) . '.' . $header_logo->getClientOriginalExtension();
            Image::make($favicon_logo)->resize(48, 48)->save('backend/uploads/setting/' . $faviconName);
        } else {
            $faviconName = $data->basic_favicon;
        }

        $basicInfo = BasicInfo::where('basic_id', 1)->update([
            'basic_company' => $request->basic_company,
            'basic_title' => $request->basic_title,
            'basic_header_logo' => $headerName,
            'basic_footer_logo' => $footerName,
            'basic_favicon' => $faviconName,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($basicInfo) {
            Session::flash('success', 'Basic Information Update successfully');
        } else {
            Session::flash('error', 'Basic Information Update Failed!');
        }
        return redirect()->back();

    }

    // Contact Info
    public function contact_index(){
        return view('admin.settings.contact_info');
    }

    public function contact_update(){

    }

    // Social Media
    public function social_index(){
        return view('admin.settings.social_media');
    }

    public function socail_update(){

    }
}
