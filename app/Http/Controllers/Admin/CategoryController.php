<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('pro_cat_status', 1)->get();
        return view('admin.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'pro_cat_name' => 'required',
        ]);

        if ($request->hasFile('pro_cat_image')) {
            $category_image = $request->file('pro_cat_image');
            $category_image_name = time() . '_' . rand(100000, 10000000) . '.' . $category_image->getClientOriginalExtension();
            Image::make($category_image)->resize(250, 250)->save('backend/uploads/category/' . $category_image_name);
        }else{
            $category_image_name = '';
        }
        if ($request->hasFile('pro_cat_icon')) {
            $category_icon = $request->file('pro_cat_icon');
            $category_icon_name = time() . '_' . rand(100000, 10000000) . '.' . $category_icon->getClientOriginalExtension();
            Image::make($category_icon)->resize(20, 20)->save('backend/uploads/category/icons/' . $category_icon_name);
        }else{
            $category_icon_name = '';
        }

        $category = Category::create([
            'pro_cat_name' => $request->pro_cat_name,
            'pro_cat_slug' => Str::slug($request->pro_cat_name, '-'),
            'pro_cat_parent' => $request->pro_cat_parent,
            'pro_cat_order' => $request->pro_cat_order,
            'pro_cat_image' => $category_image_name,
            'pro_cat_icon' => $category_icon_name,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($category) {
            Session::flash('success', 'Category Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Category Created Failed');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
