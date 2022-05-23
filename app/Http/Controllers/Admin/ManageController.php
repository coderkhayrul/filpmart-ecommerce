<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BasicInfo;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    // Basic Info
    public function basic_index(){
        $data = BasicInfo::where('basic_id', 1)->firstOrFail();
        return view('admin.settings.basic_info', compact('data'));
    }

    public function basic_update(Request $request){

        dd($request->all());

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
