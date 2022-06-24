<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules;


class WebsiteController extends Controller
{
    public function home(){
        return view('website.home');
    }
    public function login(){
        if (Auth::check()) {
            return redirect()->route('website.home');
        }else{
            return view('website.login');
        }
    }

    /**
     * @throws ValidationException
     * \Illuminate\Http\RedirectResponse
     */
    public function login_access(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (\Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect(RouteServiceProvider::WEBSITE);
            } else {
                return redirect()->back()->with('error', 'Password is incorrect');
            }
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'slug' => Str::slug('u'.$request->name, '-'),
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
        return redirect()->route('website.home');
    }
}
