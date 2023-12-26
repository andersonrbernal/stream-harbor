<?php

namespace App\Livewire;

use App\Livewire\Forms\ResetPasswordUserForm;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ResetPasswordUser extends Component
{
    public $token;
    public $user;

    protected $listeners = ['redirect' => 'redirectEvent'];
    protected $queryString = ['token', 'email'];

    public ResetPasswordUserForm $form;
    protected UserRepositoryInterface $userRepository;

    public function booted(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function mount(string $token, User $user)
    {
        $this->token = $token;
        $this->user = $user;
    }

    public function updated(string $propertyName)
    {
        $this->validateOnly($propertyName);

        if (filled($this->form->password) && filled($this->form->password_confirmation)) {
            $this->validateOnly('password_confirmation');
        }
    }

    public function resetPassword()
    {
        $this->form->validate();

        try {
            $password_same_as_current = Hash::check($this->form->password, $this->user->password);

            if ($password_same_as_current) {
                return session()->flash('error', __('pages/auth/reset-password.messages.same_password'));
            }

            $updatedUser = $this->userRepository->update($this->user->id, [
                'password' => $this->form->password,
                'remember_token' => null,
            ]);

            if (!$updatedUser) return $this->sendBaseExceptionMessage('User not updated');

            $password_reset_deleted = DB::table('password_reset_tokens')->where('email', $this->user->email)->delete();

            if (!$password_reset_deleted) return $this->sendBaseExceptionMessage('Password reset token not deleted');

            $mail = new \App\Mail\UserPasswordReseted(
                name: $this->user->name,
                email: $this->user->email,
            );

            Mail::to($this->user->email)->send($mail);

            $this->form->reset(['password', 'password_confirmation']);

            return session()->flash('success', __('pages/auth/reset-password.messages.success'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->sendBaseExceptionMessage($e);
        }
    }

    private function sendBaseExceptionMessage($message)
    {
        Log::error('ResetPasswordUser: ' . $message);
        return session()->flash('error', __('pages/auth/reset-password.messages.error'));
    }

    public function redirectEvent(string $url, int $timeout = 3000)
    {
        $this->dispatchBrowserEvent('redirect', ['url' => $url, 'timeout' => $timeout]);
    }

    public function render()
    {
        return view('livewire.reset-password-user', [
            'token' => $this->token,
            'email' => $this->user->email,
        ]);
    }
}
