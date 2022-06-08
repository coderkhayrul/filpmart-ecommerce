<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::where('partner_status',1 )->get();
        return view('admin.pages.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'partner_title' => 'required',
            'partner_url' => 'required',
            'partner_logo' => 'required',
        ]);

        if ($request->hasFile('partner_logo')) {
            $partner_image = $request->file('partner_logo');
            $partner_image_name = time() . '_' . rand(100000, 10000000) . '.' . $partner_image->getClientOriginalExtension();
            Image::make($partner_image)->resize(120, 120)->save('backend/uploads/partner/' . $partner_image_name);
        }else{
            $partner_image_name = '';
        }

        $partner = Partner::create([
            'partner_title' => $request->partner_title,
            'partner_slug' => Str::slug($request->partner_title, '-'),
            'partner_url' => $request->partner_url,
            'partner_order' => $request->partner_order,
            'partner_creator' => Auth::user()->id,
            'partner_logo' => $partner_image_name,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($partner) {
            Session::flash('success', 'Partner Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Partner Created Failed');
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
        $partner = Partner::where('partner_slug', $slug)->where('partner_status', 1)->firstOrFail();
        return view('admin.pages.partner.edit', compact('partner'));
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
        $this->validate($request,[
            'partner_title' => 'required',
            'partner_url' => 'required',
        ]);

        $partner = Partner::where('partner_slug', $slug)->where('partner_status', 1)->first();
        if ($request->hasFile('partner_logo')) {
            if (File::exists('backend/uploads/partner/'.$partner->partner_logo)) {
                File::delete('backend/uploads/partner/'.$partner->partner_logo);
            }
            $partner_image = $request->file('partner_logo');
            $partner_image_name = time() . '_' . rand(100000, 10000000) . '.' . $partner_image->getClientOriginalExtension();
            Image::make($partner_image)->resize(120, 120)->save('backend/uploads/partner/' . $partner_image_name);
        }else{
            $partner_image_name = $partner->partner_logo;
        }

        $partner = Partner::where('partner_slug', $slug)->where('partner_status', 1)->update([
            'partner_title' => $request->partner_title,
            'partner_slug' => Str::slug($request->partner_title, '-'),
            'partner_url' => $request->partner_url,
            'partner_order' => $request->partner_order,
            'partner_creator' => Auth::user()->id,
            'partner_logo' => $partner_image_name,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($partner) {
            Session::flash('success', 'Partner Update successfully');
            return redirect()->route('partner.index');
        } else {
            Session::flash('error', 'Partner Update Failed');
            return redirect()->route('partner.index');
        }
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softdelete($slug)
    {
        $partner = Partner::where('partner_slug', $slug)->where('partner_status', 1)->update([
            'partner_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($partner) {
            Session::flash('success', 'Partner Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Partner Delete Failed');
            return redirect()->back();
        }
    }
}
