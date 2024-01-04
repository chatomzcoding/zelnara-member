<?php

namespace Modules\Zelnarawedding\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Crypt;
use Modules\Zelnarawedding\Entities\Weddingtemplate;

class WeddingtemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('zelnarawedding::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('zelnarawedding::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $template = New Weddingtemplate;
        $template->layanan_id = $request->layanan_id;
        $template->nama = $request->nama;
        $template->kode = $request->kode;
        $template->design = $request->design;
        $template->keterangan = $request->keterangan;

        $request->validate([
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = "img/layanan/wedding";
        $file->move($tujuan_upload,$nama_file);
        $template->gambar = $nama_file;

        $template->save();

        return back()->with('ts','Data Berhasil ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $template = Weddingtemplate::find(Crypt::decryptString($id));
        $s = (isset($_GET['s'])) ? $_GET['s'] : 'show' ;
        switch ($s) {
            case 'demo':
                return view('zelnarawedding::template.demo.'.$template->kode);
                break;
            
            default:
                # code...
                break;
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('zelnarawedding::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $template = Weddingtemplate::find($request->id);
        $template->nama = $request->nama;
        $template->kode = $request->kode;
        $template->design = $request->design;
        $template->status = $request->status;
        $template->keterangan = $request->keterangan;

        if (isset($request->gambar)) {
            $request->validate([
                'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = "img/layanan/wedding";
            $file->move($tujuan_upload,$nama_file);
            $template->gambar = $nama_file;
        }

        $template->save();

        return back()->with('ts','Data Berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Weddingtemplate::find($id)->delete();

        return back()->with('ts','Data Berhasil dihapus');
    }
}
