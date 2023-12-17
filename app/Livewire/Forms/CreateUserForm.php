<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class CreateUserForm extends Form
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public $country_id = '';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:60',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|confirmed|min:8|max:255',
            'password_confirmation' => 'required|min:8|max:255',
            'country_id' => 'required|exists:countries,id',
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
            'name.required' => __('validation.required', ['attribute' => __('pages/auth/register.attributes.name')]),
            'name.min' => __('validation.min.string', ['attribute' => __('pages/auth/register.attributes.name'), 'min' => 3]),
            'name.max' => __('validation.max.string', ['attribute' => __('pages/auth/register.attributes.name'), 'max' => 60]),
            'email.required' => __('validation.required', ['attribute' => __('pages/auth/register.attributes.email')]),
            'email.unique' => __('validation.unique', ['attribute' => __('pages/auth/register.attributes.email')]),
            'email.email' => __('validation.email', ['attribute' => __('pages/auth/register.attributes.email')]),
            'email.max' => __('validation.max.string', ['attribute' => __('pages/auth/register.attributes.email'), 'max' => 255]),
            'password.required' => __('validation.required', ['attribute' => __('pages/auth/register.attributes.password')]),
            'password.confirmed' => __('validation.confirmed', ['attribute' => __('pages/auth/register.attributes.password')]),
            'password.min' => __('validation.min.string', ['attribute' => __('pages/auth/register.attributes.password'), 'min' => 8]),
            'password.max' => __('validation.max.string', ['attribute' => __('pages/auth/register.attributes.password'), 'max' => 255]),
            'password_confirmation.required' => __('validation.required', ['attribute' => __('pages/auth/register.attributes.password_confirmation')]),
            'password_confirmation.min' => __('validation.min.string', ['attribute' => __('pages/auth/register.attributes.password_confirmation'), 'min' => 8]),
            'password_confirmation.max' => __('validation.max.string', ['attribute' => __('pages/auth/register.attributes.password_confirmation'), 'max' => 255]),
            'country_id.required' => __('validation.required', ['attribute' => __('pages/auth/register.attributes.country_id')]),
            'country_id.exists' => __('validation.exists', ['attribute' => __('pages/auth/register.attributes.country_id')]),
        ];
    }

    public function render()
    {
        return view("livewire.create-user");
    }
}
