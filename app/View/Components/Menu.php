<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $menuaktif;

    public function __construct($menuaktif="dashboard")
    {
        $this->menuaktif = $menuaktif;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = User::find(Auth::user()->id);
        return view('components.menu', compact('user'));
    }
}
