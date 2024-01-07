<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return view('pages.user.profile', ['title' => __('components/livewire/navigation-bar.profile')]);
    }
}
