<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    // Basic Info
    public function basic_index(){
        return view('admin.settings.basic_info');
    }

    public function basic_update(){

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
