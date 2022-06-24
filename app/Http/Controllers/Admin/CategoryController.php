<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = Category::where('pro_cat_status', 1)->get();
        return view('admin.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
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

        $category = Category::create([
            'pro_cat_name' => $request->pro_cat_name,
            'pro_cat_slug' => Str::slug($request->pro_cat_name, '-'),
            'pro_cat_parent' => $request->pro_cat_parent,
            'pro_cat_order' => $request->pro_cat_order,
            'pro_cat_image' => $category_image_name,
            'pro_cat_icon' => $request->pro_cat_icon,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($category) {
            Session::flash('success', 'Category Created successfully');
        } else {
            Session::flash('error', 'Category Created Failed');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return Response
     */
    public function show($slug): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($slug)
    {
        $category = Category::where('pro_cat_slug', $slug)->where('pro_cat_status', 1)->firstOrFail();
        return view('admin.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $slug
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $slug)
    {

        $this->validate($request,[
            'pro_cat_name' => 'required',
        ]);

        $category = Category::where('pro_cat_slug', $slug)->first();
        if ($request->hasFile('pro_cat_image')) {
            if (File::exists('backend/uploads/category/'.$category->pro_cat_image)) {
                File::delete('backend/uploads/category/'.$category->pro_cat_image);
            }
            $category_image = $request->file('pro_cat_image');
            $category_image_name = time() . '_' . rand(100000, 10000000) . '.' . $category_image->getClientOriginalExtension();
            Image::make($category_image)->resize(250, 250)->save('backend/uploads/category/' . $category_image_name);
        }else{
            $category_image_name = $category->pro_cat_image;
        }

        $category = Category::where('pro_cat_slug', $slug)->where('pro_cat_status', 1)->update([
            'pro_cat_name' => $request->pro_cat_name,
            'pro_cat_slug' => Str::slug($request->pro_cat_name, '-'),
            'pro_cat_parent' => $request->pro_cat_parent,
            'pro_cat_order' => $request->pro_cat_order,
            'pro_cat_image' => $category_image_name,
            'pro_cat_icon' => $request->pro_cat_icon,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($category) {
            Session::flash('success', 'Category Update Successfully');
            return redirect()->route('category.index');
        } else {
            Session::flash('error', 'Category Update Failed!');
            return redirect()->route('category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($slug)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function softdelete($slug)
    {
        $category = Category::where('pro_cat_slug', $slug)->where('pro_cat_status', 1)->update([
            'pro_cat_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($category) {
            Session::flash('success', 'Category Delete Successfully');
            return redirect()->route('category.index');
        } else {
            Session::flash('error', 'Category Delete Failed!');
            return redirect()->route('category.index');
        }
    }
}
