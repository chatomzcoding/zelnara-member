<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Modules\Superadmin\Entities\Datapokok;

class MazerLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $menu;

    public function __construct($title="Member Zelnara",$menu="dashboard")
    {
        $this->title = $title;
        $this->menu = $menu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $datapokok = Datapokok::first();
        return view('components.mazer-layout', compact('datapokok'));
    }
}
