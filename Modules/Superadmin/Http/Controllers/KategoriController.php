<?php

namespace Modules\Superadmin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Superadmin\Entities\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $kategori = Kategori::orderBy('nama','ASC')->get();
        $label = (isset($_GET['label'])) ? $_GET['label'] : 'semua' ;
        if ($label <> 'semua') {
            $kategori = Kategori::where('label',$label)->orderBy('nama','ASC')->get();
        }
        return view('superadmin::sistem.kategori.index', compact('kategori','label'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('superadmin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $kategori = New Kategori;
        $kategori->nama = $request->nama;
        $kategori->label = $request->label;
        $kategori->keterangan = $request->keterangan;
        $kategori->save();

        return back()->with('ts','Kategori berhasil ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('superadmin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('superadmin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($request->id);
        $kategori->nama = $request->nama;
        $kategori->label = $request->label;
        $kategori->keterangan = $request->keterangan;
        $kategori->save();

        return back()->with('ts','Kategori berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Kategori::find($id)->delete();

        return back()->with('te','Kategori berhasil dihapus');
    }
}
