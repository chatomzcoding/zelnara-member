<?php

namespace Modules\Zelnaralink\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Zelnaralink\Entities\Linkmasterkatalog;

class LinkmasterkatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('zelnaralink::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('zelnaralink::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $katalog = New Linkmasterkatalog;
        $katalog->linkmaster_id = $request->linkmaster_id;
        $katalog->nama = $request->nama;
        $katalog->deskripsi = $request->deskripsi;
        $katalog->harga = $request->harga;
        $katalog->tagline = $request->tagline;

        $request->validate([
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = "img/layanan/link";
        $file->move($tujuan_upload,$nama_file);
        $katalog->gambar = $nama_file;

        $katalog->save();

        return back()->with('ts','Data Katalog berhasil tersimpan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('zelnaralink::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('zelnaralink::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $katalog = Linkmasterkatalog::find($id);
        $katalog->nama = $request->nama;
        $katalog->deskripsi = $request->deskripsi;
        $katalog->harga = $request->harga;
        $katalog->tagline = $request->tagline;

        if (isset($request->gambar)) {
            $request->validate([
                'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = "img/layanan/link";
            $file->move($tujuan_upload,$nama_file);
            $katalog->gambar = $nama_file;
        }

        $katalog->save();

        return back()->with('ts','Data Katalog berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Linkmasterkatalog::find($id)->delete();
        return back()->with('ts','Data Katalog berhasil dihapus');
    }
}
