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
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    function dashboard()
    {
        return view('admin.dashboard');
    }

    function blank()
    {
        return view('admin.blank');
    }

    public function recycle_bin()
    {
        $user = User::where('status', 0)->get();
        // $seller = Seller::where('status', 0)->get();
        $partner = Partner::where('partner_status', 0)->get();
        $product = Product::where('product_status', 0)->get();
        $brand = Brand::where('brand_status', 0)->get();
        $category = Category::where('pro_cat_status', 0)->get();
        return view('admin.recycle_bin', compact('user', 'product', 'partner', 'brand', 'category'));
    }

    public function role_show()
    {
        $roles = Role::orderBy('id', 'ASC')->get();
        return view('admin.pages.roles.index', compact('roles'));
    }

    public function role_edit($role_id){
        $role = Role::where('id',$role_id)->first();
        $permissions = Permission::all();
        return view('admin.pages.roles.edit', compact('role', 'permissions'));
    }

    public function role_update($role_id, Request $request){

        $role = Role::findOrFail($role_id);
        $role->syncPermissions($request->permission);
        if ($role) {
            Session::flash('success', 'Role Permission Updated Successfully');
            return redirect()->route('manage.role');
        } else {
            Session::flash('error', 'Role Permission Failed');
            return redirect('manage.role')->route('manage.role');
        }
    }
}
