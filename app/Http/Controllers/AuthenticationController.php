<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthenticationController extends Controller
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function register()
    {
        return view('pages.auth.register', ['title' => __('pages/auth/register.title')]);
    }

    public function login()
    {
        return view('pages.auth.login', ['title' => __('pages/auth/login.title')]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('index', ['locale' => app()->getLocale()]);
    }

    public function forgotPassword()
    {
        return view('pages.auth.forgot-password', ['title' => __('pages/auth/forgot-password.title')]);
    }

    public function resetPassword(Request $request, string $token = null)
    {
        try {
            $token = $request->route('token');
            $email = $request->input('email');

            if (!$token || !$email) return $this->redirectToForgotPassword();

            $user = $this->userRepository->findByEmail($email);
            $tokenRecord = DB::table('password_reset_tokens')->where('email', $email)->first();

            if (!$tokenRecord || $tokenRecord->token != $token) return $this->redirectToForgotPassword();

            return view('pages.auth.reset-password', [
                'title' => __('pages/auth/reset-password.title'),
                'token' => $token,
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            Log::error('Error on reset password: ' . $e->getMessage());
            return $this->redirectToForgotPassword();
        }
    }

    private function redirectToForgotPassword()
    {
        return redirect()->route('auth.forgot-password', ['locale' => app()->getLocale()]);
    }
}
