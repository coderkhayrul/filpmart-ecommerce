<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function dashboard(){
        return view('admin.dashboard');
    }

    function blank(){
        return view('admin.blank');
    }

    public function recycle_bin(){
        return view('admin.recycle_bin');
    }
}
