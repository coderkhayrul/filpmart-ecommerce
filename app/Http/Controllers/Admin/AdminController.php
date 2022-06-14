<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
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
        $user = User::where('status', 0)->get();
        // $seller = Seller::where('status', 0)->get();
        $partner = Partner::where('partner_status', 0)->get();
        $product = Product::where('product_status', 0)->get();
        $brand = Brand::where('brand_status', 0)->get();
        $category = Category::where('pro_cat_status', 0)->get();
        return view('admin.recycle_bin', compact('user', 'product','partner', 'brand', 'category'));
    }
}
