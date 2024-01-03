<?php

namespace Modules\Zelnaralink\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Zelnaralink\Entities\Linkmaster;

class LinkmasterController extends Controller
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
        $request->validate([
            'url' => 'unique:link_master',
        ]);

        $linkmaster = New Linkmaster;
        $linkmaster->member_id = $request->member_id;
        $linkmaster->layanan_id = $request->layanan_id;
        $linkmaster->judul = $request->judul;
        $linkmaster->deskripsi = $request->deskripsi;
        $linkmaster->tema = $request->tema;
        $linkmaster->url = $request->url;
        $linkmaster->view = 0;

        $request->validate([
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:3000',
        ]);
        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = "img/layanan/link";
        $file->move($tujuan_upload,$nama_file);
        $linkmaster->gambar = $nama_file;

        $linkmaster->save();

        return back()->with('ts','Link Berhasil dibuat');
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
        $s = (isset($request->s)) ? $request->s : 'update' ;
        $linkmaster = Linkmaster::find($request->id);
        switch ($s) {
            case 'kontak':
                $linkmaster->no_telp = $request->no_telp;
                $linkmaster->no_wa = $request->no_wa;
                $linkmaster->email = $request->email;
                $linkmaster->alamat = $request->alamat;
                $linkmaster->no_faks = $request->no_faks;
                $linkmaster->jam_kerja = $request->jam_kerja;
                $linkmaster->situs_web = $request->situs_web;
                $linkmaster->save();
                
                return back()->with('ts','Kontak Berhasil diperbaharui');

                break;
            
            default:
                $linkmaster->judul = $request->judul;
                $linkmaster->deskripsi = $request->deskripsi;
                $linkmaster->tema = $request->tema;
                $linkmaster->url = $request->url;
        
                if (isset($request->gambar)) {
                    $request->validate([
                        'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:3000',
                    ]);
                    $file = $request->file('gambar');
                    $nama_file = time()."_".$file->getClientOriginalName();
                    $tujuan_upload = "img/layanan/link";
                    $file->move($tujuan_upload,$nama_file);
                    $linkmaster->gambar = $nama_file;
                }
                $linkmaster->save();
                return back()->with('ts','Link Berhasil diperbaharui');
                break;
        }


    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Linkmaster::find($id)->delete();
        
        return back()->with('ts','Link Berhasil dihapus');
    }
}
