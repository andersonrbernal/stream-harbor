<?php

namespace App\Livewire;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class LoginUser extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember_me = false;

    public function login()
    {
        $userAuthenticated = Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ], $this->remember_me);

        if ($userAuthenticated) {
            request()->session()->regenerate();
            return redirect()->route('index', ['locale' => app()->getLocale()]);
        }

        return session()->flash('message', __('pages/auth/login.form_error.credentials_error'));
    }

    public function render()
    {
        return view('livewire.login-user');
    }
}
