<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Aksi extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $link;
    public $id;
    public $unique;
    public $hapus;

    public function __construct($link=NULL,$id,$unique=NULL,$hapus=TRUE)
    {
        $this->link = $link;
        $this->id = $id;
        $this->unique = $unique;
        $this->hapus = $hapus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $nilaiid = ($this->unique <> NULL) ? $this->unique : $this->id ;
        return view('components.aksi', compact('nilaiid'));
    }
}
