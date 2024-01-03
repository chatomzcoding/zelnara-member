<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Bsmodal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $kategori;
    public $judul;
    public $dialog;
    public $link;
    public $border;
    public $warna;
    public $id;

    public function __construct($kategori='modal',$judul="Modal Bootstrap",$dialog=NULL,$link=NULL,$border=TRUE,$id,$warna=NULL)
    {
        $this->kategori = $kategori;
        $this->judul = $judul;
        $this->dialog = $dialog;
        $this->link = $link;
        $this->border = $border;
        $this->warna = $warna;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $classborder = ($this->border) ? NULL : 'borderless' ;
        return view('components.bsmodal', compact('classborder'));
    }
}
