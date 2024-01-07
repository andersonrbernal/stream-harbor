<?php

namespace App\Livewire\Forms;

use Illuminate\Http\UploadedFile;
use Livewire\Attributes\Rule;
use Livewire\Form;

class UpdateProfileUserForm extends Form
{
    public array $profile_photo_allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    public ?UploadedFile $profile_photo = null;
    public string $name = '';
    public string $email = '';
    public string $country_id = '';

    public function rules(): array
    {
        $allowed_extensions = implode(',', $this->profile_photo_allowed_extensions);

        return [
            'name' => 'required|min:3|max:60',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'profile_photo' => "nullable|image|mimes:$allowed_extensions|max:1024|dimensions:min_width=100,min_height=200",
            'country_id' => 'required|exists:countries,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('validation.required', ['attribute' => __('pages/user/profile.attributes.name')]),
            'name.min' => __('validation.min.string', ['attribute' => __('pages/user/profile.attributes.name'), 'min' => 3]),
            'name.max' => __('validation.max.string', ['attribute' => __('pages/user/profile.attributes.name'), 'max' => 60]),
            'email.required' => __('validation.required', ['attribute' => __('pages/user/profile.attributes.email')]),
            'email.email' => __('validation.email', ['attribute' => __('pages/user/profile.attributes.email')]),
            'email.max' => __('validation.max.string', ['attribute' => __('pages/user/profile.attributes.email'), 'max' => 255]),
            'email.unique' => __('validation.unique', ['attribute' => __('pages/user/profile.attributes.email')]),
            'profile_photo.image' => __('validation.image', ['attribute' => __('pages/user/profile.attributes.profile_photo')]),
            'profile_photo.max' => __('validation.max.file', ['attribute' => __('pages/user/profile.attributes.profile_photo'), 'max' => 2048]),
            'country_id.required' => __('validation.required', ['attribute' => __('pages/user/profile.attributes.country_id')]),
            'country_id.exists' => __('validation.exists', ['attribute' => __('pages/user/profile.attributes.country_id')]),
        ];
    }
}
