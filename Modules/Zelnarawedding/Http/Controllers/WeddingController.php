<?php

namespace Modules\Zelnarawedding\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Zelnarawedding\Entities\Wedding;

class WeddingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    protected $folder = 'img/layanan/wedding';

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
        $wedding = New Wedding;
        $wedding->member_id = $request->member_id;
        $wedding->layanan_id = $request->layanan_id;
        $wedding->nama = $request->nama;
        $wedding->link = $request->link;
        $wedding->weddingtemplate_id = $request->weddingtemplate_id;
        $wedding->tempat_pernikahan = $request->tempat_pernikahan;
        $wedding->alamat_pernikahan = $request->alamat_pernikahan;
        $wedding->tanggal_pernikahan = $request->tanggal_pernikahan;

        if (isset($request->photo)) {
            $request->validate([
                'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            $file = $request->file('photo');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move($this->folder,$nama_file);
            $wedding->photo = $nama_file;
        }

        $wedding->save();

        return back()->with('ts','Data Berhasil ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('zelnarawedding::show');
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
        $wedding = Wedding::find($id);
        $wedding->nama = $request->nama;
        $wedding->link = $request->link;
        $wedding->tempat_pernikahan = $request->tempat_pernikahan;
        $wedding->alamat_pernikahan = $request->alamat_pernikahan;
        $wedding->tanggal_pernikahan = $request->tanggal_pernikahan;
        $wedding->hadiah_nama1 = $request->hadiah_nama1;
        $wedding->hadiah_nama2 = $request->hadiah_nama2;
        $wedding->hadiah_no1 = $request->hadiah_no1;
        $wedding->hadiah_no2 = $request->hadiah_no2;
        $wedding->hadiah_an1 = $request->hadiah_an1;
        $wedding->hadiah_an2 = $request->hadiah_an2;
        $wedding->jam_akad = $request->jam_akad;
        $wedding->jam_resepsi = $request->jam_resepsi;
        $wedding->maps = $request->maps;
        $wedding->maps_link = $request->maps_link;

        if (isset($request->photo)) {
            $request->validate([
                'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            $file = $request->file('photo');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move($this->folder,$nama_file);
            deletefile($this->folder.'/'.$wedding->photo);
            $wedding->photo = $nama_file;
        }

        $wedding->save();

        return back()->with('ts','Data Berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $wedding = Wedding::find($id);
        deletefile($this->folder.'/'.$wedding->photo);
        $wedding->delete();

        return back()->with('ts','Data Berhasil dihapus');
    }
}
