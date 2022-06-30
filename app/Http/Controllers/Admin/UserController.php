<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = User::where('status', 1)->orderby('id', 'ASC')->get();
        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $user = User::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'slug' => Str::slug($request->name, '-'),
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'status' => 1
        ]);
        if ($user) {
            Session::flash('success', 'User created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'User created Failed!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $data = User::where('slug', $slug)->firstOrFail();
        return view('admin.pages.users.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $slug
     * @return Application|Factory|View
     */
    public function edit($slug)
    {
        $data = User::where('status', 1)->where('slug', $slug)->firstOrFail();
        return view('admin.pages.users.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $slug
     * @return RedirectResponse
     */
    public function update(Request $request, $slug)
    {
        $user = User::where('status', 1)->where('slug', $slug)->firstOrFail();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->update();
        $user->syncRoles($request->role);
        if ($user) {
            Session::flash('success', 'User Update successfully');
            return redirect()->route('user.index');
        } else {
            Session::flash('error', 'User Update Failed!');
            return redirect()->route('user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $slug
     * @return Response
     */
    public function destroy($slug)
    {
        //
    }

    /**
     * Temporally Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $slug
     * @return RedirectResponse
     */
    public function softdelete(Request $request, $slug)
    {
        $data = User::where('slug', $slug)->firstOrFail();
        $data->status = 0;
        $data->update();

        if ($data) {
            Session::flash('success', 'User Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'User Delete Failed!');
            return redirect()->back();
        }


    }

    /**
     * Suspend the specified resource from storage.
     *
     * @param $slug
     * @return void
     */
    public function suspend($slug)
    {
        //
    }
}
