<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('status', 1)->orderby('id','ASC')->get();
        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'role' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $user = User::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'slug' => Str::slug($request->name, '-'),
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'status' => 1
        ]);

        if($user){
            Session::flash('success', 'User created successfully');
            return redirect()->back();
        }else{
            Session::flash('error', 'User created Failed!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = User::where('slug',$slug)->firstOrFail();
        return view('admin.pages.users.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = User::where('status', 1)->where('slug', $slug)->firstOrFail();
        return view('admin.pages.users.edit', compact('data'));
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
        $data = User::where('status', 1)->where('slug' ,$slug)->firstOrFail();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->role = $request->role;
        $data->address = $request->address;
        $data->update();

        if($data){
            Session::flash('success', 'User Update successfully');
            return redirect()->back();
        }else{
            Session::flash('error', 'User Update Failed!');
            return redirect()->back();
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
     * Temporaly Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softdelete(Request $request, $slug)
    {
        $data = User::where('slug', $slug)->firstOrFail();
        $data->status = 0;
        $data->update();

        if($data){
            Session::flash('success', 'User Delete successfully');
            return redirect()->back();
        }else{
            Session::flash('error', 'User Delete Failed!');
            return redirect()->back();
        }


    }

    /**
     * Suspend the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function suspend($slug)
    {
        //
    }
}
