<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rule as ValidationRule;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ResetPasswordUserForm extends Form
{
    public string $password = '';
    public string $password_confirmation = '';

    public function rules()
    {
        return [
            'password' => 'required|confirmed|min:8|max:255',
            'password_confirmation' => 'required|min:8|max:255',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => __('validation.required', ['attribute' => __('pages/auth/reset-password.attributes.password')]),
            'password.min' => __('validation.min.string', ['attribute' => __('pages/auth/reset-password.attributes.password'), 'min' => 8]),
            'password.max' => __('validation.max.string', ['attribute' => __('pages/auth/reset-password.attributes.password'), 'max' => 255]),
            'password.confirmed' => __('validation.confirmed', ['attribute' => __('pages/auth/reset-password.attributes.password')]),
            'password_confirmation.required' => __('validation.required', ['attribute' => __('pages/auth/reset-password.attributes.password_confirmation')]),
            'password_confirmation.min' => __('validation.min.string', ['attribute' => __('pages/auth/reset-password.attributes.password_confirmation'), 'min' => 8]),
            'password_confirmation.max' => __('validation.max.string', ['attribute' => __('pages/auth/reset-password.attributes.password_confirmation'), 'max' => 255]),
        ];
    }

    public function render()
    {
        return view('livewire.reset-password-user');
    }
}
