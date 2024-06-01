<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showFormLogin()
    {
    return view('auth.login');
    }

    public function Login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

//            Kiểm tra tài khoản phải Admin ko
            if(Auth::user()->isAdmin()){
                return redirect('/admin');
            }

            return redirect()->intended('/home');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

//        dd($request->all());
    }
    public function Logout()
    {
        Auth::logout();
//    invalidate : Xóa all session đang có trên hệ thống => reset toàn bộ
    \request()->session()->invalidate();

    return redirect('/');
    }
}
