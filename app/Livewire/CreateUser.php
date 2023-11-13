<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateUserForm;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateUser extends Component
{
    public CreateUserForm $form;

    public $countries = [];

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
    }

    public function updated()
    {
        $this->validate();
    }

    public function save()
    {
        $this->form->validate();

        try {
            $this->userRepository->create($this->form->all());

            $user = Auth::attempt(["email" => $this->form->email, "password" => $this->form->password]);
            $data = ['locale' => app()->getLocale()];

            if (isset($user)) return redirect()->route('index', $data);

            return redirect()->route('auth.login', $data);
        } catch (\Exception $e) {
            session()->flash('message', __('pages/auth/register.form_error'));
        }
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
