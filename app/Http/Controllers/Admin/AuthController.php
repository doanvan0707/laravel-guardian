<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a login.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('admin.login.index');
    }


    /**
     * Check login user
     *
     * @return \Illuminate\Http\Response
     */
    public function checkLogin(Request $request)
    {
        $request->validate([
           'email' => 'required',
           'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        $checkAdmin = User::where('email', $request->email)->first();
        if (Auth::attempt($credentials) && $checkAdmin->is_admin == 1) {
                return redirect()->route('dashboard')
                                ->withSuccess('Signed in');
        }
        return redirect()->route('login')->withSuccess('Login details are not valid');
    }


    /**
     * Display a dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {   
        if (Auth::check()) {
            return view('admin.dashboard');
        }

        return redirect()->route('login')->withSuccess('You are not allowed to access');
    }

    /**
     * Logout user
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {   
        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }
}
