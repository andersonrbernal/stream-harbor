<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function register()
    {
        return view('pages.auth.register', ['title' => 'Sign up']);
    }

    public function login()
    {
        return view('pages.auth.login', ['title' => 'Sign in']);
    }

    public function forgotPassword()
    {
        return view('pages.auth.forgot-password', ['title' => 'Forgot your password?']);
    }
}
