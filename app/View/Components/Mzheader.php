<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Mzheader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $judul;
    public $deskripsi;
    public $link;
    public $halaman;

    public function __construct($judul="Judul",$deskripsi=NULL,$link=[],$halaman="halaman")
    {
        $this->judul = $judul;
        $this->deskripsi = $deskripsi;
        $this->link = $link;
        $this->halaman = $halaman;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.mzheader');
    }
}
