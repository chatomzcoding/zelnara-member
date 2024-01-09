<?php

namespace Modules\Zelnarawedding\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Zelnarawedding\Entities\Weddingcerita;

class WeddingceritaController extends Controller
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
        $cerita = New Weddingcerita;
        $cerita->wedding_id = $request->wedding_id;
        $cerita->nama = $request->nama;
        $cerita->tanggal = $request->tanggal;
        $cerita->deskripsi = $request->deskripsi;

        $request->validate([
            'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $file = $request->file('photo');
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move($this->folder,$nama_file);
        $cerita->photo = $nama_file;

        $cerita->save();

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
        $cerita = Weddingcerita::find($request->id);
        $cerita->nama = $request->nama;
        $cerita->tanggal = $request->tanggal;
        $cerita->deskripsi = $request->deskripsi;

        if (isset($request->photo)) {
            $request->validate([
                'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            $file = $request->file('photo');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move($this->folder,$nama_file);
            deletefile($this->folder.'/'.$cerita->photo);
            $cerita->photo = $nama_file;
        }

        $cerita->save();

        return back()->with('ts','Data Berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $cerita = Weddingcerita::find($id);
        deletefile($this->folder.'/'.$cerita->photo);
        $cerita->delete();
        
        return back()->with('ts','Data Berhasil dihapus');
    }
}
