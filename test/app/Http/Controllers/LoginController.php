<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('app');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = DB::table('users')->where('email', $request->email)->first();

        if ($user) {
            if ($request->password === $user->password) {
                Session::put('user', $user);
                Session::put('user_id', $user->id);
    
                return redirect()->intended('/home');
            } else {
                return back()->withErrors([
                    'password' => 'The provided password is incorrect.',
                ])->withInput($request->except('password'));
            }
        } else {
            return back()->withErrors([
                'email' => 'User not found. Please register or check your email.',
            ])->withInput($request->only('email'));
        }
    }


}
