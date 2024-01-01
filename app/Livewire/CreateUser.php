<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateUserForm;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    use WithFileUploads;

    public CreateUserForm $form;

    public $countries = [];
    public string $profile_photo_allowed_extensions;

    protected $countryRepository;
    protected $userRepository;

    public function boot(
        CountryRepositoryInterface $countryRepository,
        UserRepositoryInterface $userRepository,
    ) {
        $this->countryRepository = $countryRepository;
        $this->userRepository = $userRepository;
    }

    public function mount()
    {
        $this->countries = $this->countryRepository->findAll();
        $this->profile_photo_allowed_extensions = implode(', ', array_map(function ($extension) {
            return 'image/' . $extension;
        }, $this->form->profile_photo_allowed_extensions));
    }

    public function updated($property)
    {
        $this->validateOnly($property);

        if (filled($this->form->password) && filled($this->form->password_confirmation)) {
            $this->validateOnly('password_confirmation');
        }
    }

    public function generateProfilePhotoName(UploadedFile $uploadedFile)
    {
        return $uploadedFile->getClientOriginalName() . '-' . time() . '.' . $uploadedFile->extension();
    }

    public function save()
    {
        $this->form->validate();

        try {
            $profile_photo_name = $this->generateProfilePhotoName($this->form->profile_photo);

            $profile_photo_path = $this->form->profile_photo->storePubliclyAs('user_profile_photos', $profile_photo_name);

            $this->userRepository->create([
                'name' => $this->form->name,
                'email' => $this->form->email,
                'password' => $this->form->password,
                'country_id' => $this->form->country_id,
                'profile_photo' => $profile_photo_path,
            ]);

            $user = auth()->attempt(["email" => $this->form->email, "password" => $this->form->password]);
            $data = ['locale' => app()->getLocale()];

            if (isset($user)) return redirect()->route('index', $data);

            return redirect()->route('auth.login', $data);
        } catch (\Exception $e) {
            Log::error('Error creating user: ' . $e->getMessage());
            session()->flash('message', __('pages/auth/register.form_error'));
        }
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
