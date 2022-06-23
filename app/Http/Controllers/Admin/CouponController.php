<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::where('coupon_status', 1 )->orderBy('coupon_id', 'asc')->get();
        return view('admin.pages.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'coupon_title' => 'required',
            'coupon_code' => 'required',
            'coupon_amount' => 'required',
            'coupon_starting' => 'required',
            'coupon_ending' => 'required',
        ]);
        $coupon = Coupon::create([
            'coupon_title' => $request->coupon_title,
            'coupon_code' => $request->coupon_code,
            'coupon_amount' => $request->coupon_amount,
            'coupon_starting' => $request->coupon_starting,
            'coupon_ending' => $request->coupon_ending,
            'coupon_remarks' => $request->coupon_remarks,
            'coupon_creator' => Auth::user()->id,
            'coupon_slug' => uniqid(),
            'coupon_status' => 1
        ]);
        if ($coupon) {
            Session::flash('success', 'Coupon Create successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Coupon Create Failed!');
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
    public function edit($slug)
    {
        $coupon = Coupon::where('coupon_status', 1)->where('coupon_slug', $slug)->firstOrFail();
        return view('admin.pages.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'coupon_title' => 'required',
            'coupon_code' => 'required',
            'coupon_amount' => 'required',
            'coupon_starting' => 'required',
            'coupon_ending' => 'required',
        ]);

        $coupon = Coupon::where('coupon_status', 1)->where('coupon_slug', $slug)->update([
            'coupon_title' => $request->coupon_title,
            'coupon_code' => $request->coupon_code,
            'coupon_amount' => $request->coupon_amount,
            'coupon_starting' => $request->coupon_starting,
            'coupon_ending' => $request->coupon_ending,
            'coupon_remarks' => $request->coupon_remarks,
            'coupon_editor' => Auth::user()->id,
        ]);

        if ($coupon) {
            Session::flash('success', 'Coupon Delete successfully');
            return redirect()->route('coupon.index');
        } else {
            Session::flash('error', 'Coupon Delete Failed!');
            return redirect()->route('coupon.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softdelete($slug)
    {
        $coupon = Coupon::where('coupon_status', 1)->where('coupon_slug', $slug)->update([
            'coupon_status' => 0
        ]);

        if ($coupon) {
            Session::flash('success', 'Coupon Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Coupon Delete Failed!');
            return redirect()->back();
        }
    }
}
