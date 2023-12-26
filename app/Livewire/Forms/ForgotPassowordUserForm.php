<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class ForgotPassowordUserForm extends Form
{
    public string $email = '';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users,email',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.required' => __('validation.required', ['attribute' => __('pages/auth/forgot-password.attributes.email')]),
            'email.exists' => __('validation.exists', ['attribute' => __('pages/auth/forgot-password.attributes.email')]),
            'email.email' => __('validation.email', ['attribute' => __('pages/auth/forgot-password.attributes.email')]),
        ];
    }

    public function render()
    {
        return view("livewire.forgot-password");
    }
}
