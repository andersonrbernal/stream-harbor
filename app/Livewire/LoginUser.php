<?php

namespace App\Livewire;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class LoginUser extends Component
{
    public array $credentials = [
        'email' => '',
        'password' => '',
    ];

    public function login()
    {
        $userAuthenticated = Auth::attempt($this->credentials);
        $data = ['locale' => app()->getLocale()];

        if ($userAuthenticated) {
            request()->session()->regenerate();
            return redirect()->route('index', $data);
        }

        return session()->flash('message', __('pages/auth/login.form_error.credentials_error'));
    }

    public function render()
    {
        return view('livewire.login-user');
    }
}
