<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BasicInfo;
use App\Models\ContactInfo;
use App\Models\SocialMedia;
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
            $footerName = time() . '_' . rand(100000, 10000000) . '.' . $footer_logo->getClientOriginalExtension();
            Image::make($footer_logo)->resize(140, 40)->save('backend/uploads/setting/' . $footerName);
        } else {
            $footerName = $data->basic_footer_logo;
        }

        // Basic Favicon Logo
        if ($request->hasFile('basic_favicon')) {
            $favicon_logo = $request->file('basic_favicon');
            $faviconName = time() . '_' . rand(100000, 10000000) . '.' . $favicon_logo->getClientOriginalExtension();
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
            return redirect()->back();
        } else {
            Session::flash('error', 'Basic Information Update Failed!');
            return redirect()->back();
        }

    }

    // Contact Info
    public function contact_index(){
        $data = ContactInfo::where('contact_id', 1)->where('contact_status', 1)->firstOrFail();
        return view('admin.settings.contact_info', compact('data'));
    }

    public function contact_update(Request $request){

        $contactInfo = ContactInfo::where('contact_id', 1)->update([
            'contact_phone_one' => $request->contact_phone_one,
            'contact_phone_two' => $request->contact_phone_two,
            'contact_email_one' => $request->contact_email_one,
            'contact_email_two' => $request->contact_email_two,
            'contact_address_one' => $request->contact_address_one,
            'contact_address_two' => $request->contact_address_two,
            'contact_status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($contactInfo) {
            Session::flash('success', 'Contact Information Update successfully');
        } else {
            Session::flash('error', 'Contact Information Update Failed!');
        }
        return redirect()->back();
    }

    // Social Media
    public function social_index(){
        $data = SocialMedia::where('sm_id', 1)->where('sm_status', 1)->firstOrFail();
        return view('admin.settings.social_media', compact('data'));
    }

    public function socail_update(Request $request){
        $social_medial = SocialMedia::where('sm_id', 1)->update([
            'sm_facebook' => $request->sm_facebook,
            'sm_twitter' => $request->sm_twitter,
            'sm_linkedin' => $request->sm_linkedin,
            'sm_dribbble' => $request->sm_dribbble,
            'sm_youtube' => $request->sm_youtube,
            'sm_slack' => $request->sm_slack,
            'sm_instagram' => $request->sm_instagram,
            'sm_behance' => $request->sm_behance,
            'sm_google' => $request->sm_google,
            'sm_reddit' => $request->sm_reddit,
            'sm_status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($social_medial) {
            Session::flash('success', 'Socail Media Update successfully');
        } else {
            Session::flash('error', 'Socail Media Update Failed!');
        }

        return redirect()->back();
    }
}
