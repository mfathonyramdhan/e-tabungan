<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('acc_email', 'acc_password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/dashboard');
        } else {
            // Authentication failed
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
