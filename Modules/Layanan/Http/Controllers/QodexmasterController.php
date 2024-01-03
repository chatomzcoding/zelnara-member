<?php

namespace Modules\Layanan\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Layanan\Entities\Qodexmaster;

class QodexmasterController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('layanan::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('layanan::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $qodex = New Qodexmaster;
        $qodex->layanan_id = $request->layanan_id;
        $qodex->member_id = $request->member_id;
        $qodex->nama = $request->nama;
        $qodex->ukuran = $request->ukuran;
        $qodex->isi = $request->isi;
        $qodex->kategori = $request->kategori;
        $qodex->kode = $request->kode;
        $qodex->keterangan = $request->keterangan;

        if (isset($request->gambar)) {
            $request->validate([
                'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:3000',
            ]);
            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = "img/layanan/qodex";
            $file->move($tujuan_upload,$nama_file);
            $qodex->gambar = $nama_file;
        }

        $qodex->save();

        return back()->with('ts','Qodex berhasil ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('layanan::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('layanan::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $qodex = Qodexmaster::find($request->id);
        $qodex->nama = $request->nama;
        $qodex->ukuran = $request->ukuran;
        $qodex->isi = $request->isi;
        $qodex->kategori = $request->kategori;
        $qodex->kode = $request->kode;
        $qodex->keterangan = $request->keterangan;

        if (isset($request->gambar)) {
            $request->validate([
                'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:3000',
            ]);
            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = "img/layanan/qodex";
            $file->move($tujuan_upload,$nama_file);
            $qodex->gambar = $nama_file;
        }

        $qodex->save();

        return back()->with('ts','Qodex berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Qodexmaster::find($id)->delete();
        
        return back()->with('ts','Qodex berhasil dihapus');
    }
}
