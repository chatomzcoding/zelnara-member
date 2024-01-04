<?php

namespace Modules\Superadmin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Superadmin\Entities\Layanan;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $layanan = Layanan::all();
        return view('superadmin::layanan.index', compact('layanan'));
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
        $layanan = New Layanan;
        $layanan->nama = $request->nama;
        $layanan->kode = $request->kode;
        $layanan->tagline = $request->tagline;
        $layanan->deskripsi = $request->deskripsi;
        $layanan->url = $request->url;

        $request->validate([
            'logo' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $file = $request->file('logo');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = "img/sistem";
        $file->move($tujuan_upload,$nama_file);
        $layanan->logo = $nama_file;

        $layanan->save();
        return back()->with('ts','Data Berhasil ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $layanan = Layanan::find($id);
        return view('superadmin::layanan.'.$layanan->kode.'.index', compact('layanan'));
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
        $layanan = Layanan::find($request->id);
        $layanan->nama = $request->nama;
        $layanan->kode = $request->kode;
        $layanan->tagline = $request->tagline;
        $layanan->deskripsi = $request->deskripsi;
        $layanan->url = $request->url;

        if (isset($request->logo)) {
            $request->validate([
                'logo' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            $file = $request->file('logo');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = "img/sistem";
            $file->move($tujuan_upload,$nama_file);
            $layanan->logo = $nama_file;
        }

        $layanan->save();
        return back()->with('ts','Data Berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Layanan::find($id)->delete();
        return back()->with('ts','Data Berhasil dihapus');
    }
}
