<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class NavigationBar extends Component
{
    protected Authenticatable|User|null $user;
    protected $userDropdownId;
    protected $avatarButtonId;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->user = Auth::user();
        $this->userDropdownId = Str::random(8);
        $this->avatarButtonId = Str::random(8);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation-bar', [
            'user' => $this->user,
            'userDropdownId' => $this->userDropdownId,
            'avatarButtonId' => $this->avatarButtonId,
        ]);
    }
}
