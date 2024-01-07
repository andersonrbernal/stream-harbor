<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

class NavigationBar extends Component
{
    protected Authenticatable|User|null $user;
    protected $userDropdownId = 'user-dropdown';
    protected $avatarButtonId = 'avatar-button';

    /**
     * Create a new component instance.
     */
    public function mount()
    {
        $this->user = Auth::user();
    }

    #[On('refresh-navigation-bar')]
    public function refresh()
    {
        $this->mount();
        $this->render();
    }

    public function render()
    {
        return view('livewire.navigation-bar', [
            'user' => $this->user,
            'userDropdownId' => $this->userDropdownId,
            'avatarButtonId' => $this->avatarButtonId,
        ]);
    }
}
