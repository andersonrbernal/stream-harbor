<?php

namespace App\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use App\Livewire\Forms\ForgotPassowordUserForm;
use App\Mail\ResetUserPasswordMail;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordUser extends Component
{
    public ForgotPassowordUserForm $form;
    protected UserRepositoryInterface $userRepository;

    public function sendEmail()
    {
        $this->form->validate();
        try {
            $user = $this->userRepository->findByEmail($this->form->email);
            $token = hash_hmac('sha256', Str::random(40), config('app.key'));

            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $user->email],
                ['email' => $user->email, 'token' => $token, 'created_at' => now()]
            );

            $mail = new ResetUserPasswordMail(name: $user->name, email: $user->email, token: $token);

            Mail::to($user->email)->send($mail);

            $this->form->reset();
            return session()->flash('success', __('pages/auth/forgot-password.messages.success'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return session()->flash('error', __('pages/auth/forgot-password.messages.error'));
        }
    }

    public function booted(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function render()
    {
        return view('livewire.forgot-password-user');
    }
}
