<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        // validation => email, password => required
        $credentails = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required']
        ], [
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter a valid email address'
        ]);

        // check if email and password are correct and exist in the users table
        if (Auth::attempt($credentails)) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        // redirect
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('admin.login');
    }
}
