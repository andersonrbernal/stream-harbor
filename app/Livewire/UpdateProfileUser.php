<?php

namespace App\Livewire;

use App\Livewire\Forms\UpdateProfileUserForm;
use App\Models\Country;
use App\Models\User;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfileUser extends Component
{
    use WithFileUploads;

    public UpdateProfileUserForm $form;
    public string $profile_photo_allowed_extensions;
    public User $user;
    public Collection $countries;
    protected CountryRepositoryInterface $countryRepository;

    protected $listeners = ['profileUpdated' => '$refresh'];

    public function boot(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->countries = $this->countryRepository->findAll();
        $this->profile_photo_allowed_extensions = implode(', ', array_map(fn ($extension) => 'image/' . $extension, $this->form->profile_photo_allowed_extensions));

        $this->form->fill([
            'name' => $this->user->name,
            'email' => $this->user->email,
            'country_id' => $this->user->country_id,
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateProfile()
    {
        $this->form->validate();

        try {
            $profile_photo_path = null;

            if ($this->form->profile_photo) {
                $profile_photo_name = CreateUser::generateProfilePhotoName($this->form->profile_photo);
                $profile_photo_path = $this->form->profile_photo->storePubliclyAs('user_profile_photos', $profile_photo_name);
            }

            $this->user->update([
                'name' => $this->form->name,
                'email' => $this->form->email,
                'country_id' => $this->form->country_id,
                'profile_photo' => $profile_photo_path ? $profile_photo_path : $this->user->profile_photo,
            ]);

            $this->dispatch('refresh-navigation-bar')->to(NavigationBar::class);

            return session()->flash('success', __('components/livewire/update-profile-user.messages.update'));
        } catch (\Exception $e) {
            Log::error('Error updating user profile: ' . $e->getMessage());
            return session()->flash('error', __('components/livewire/update-profile-user.messages.error'));
        }
    }

    public function render()
    {
        return view('livewire.update-profile-user', []);
    }
}
