<?php

namespace Modules\Layanan\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Layanan\Entities\Voting;

class VotingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    protected $folder = "img/layanan/voting";

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
        $voting = New Voting;
        $voting->layanan_id = $request->layanan_id;
        $voting->member_id = $request->member_id;
        $voting->nama = $request->nama;
        $voting->link = $request->link;
        $voting->status = $request->status;
        $voting->tanggal_mulai = $request->tanggal_mulai;
        $voting->tanggal_akhir = $request->tanggal_akhir;
        $voting->sistem = $request->sistem;
        $voting->keterangan = $request->keterangan;
        $voting->view = 0;

        $request->validate([
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:3000',
        ]);
        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move($this->folder,$nama_file);
        $voting->gambar = $nama_file;

        $voting->save();

        return back()->with('ts','Voting berhasil ditambahkan');
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
        $voting = Voting::find($request->id);
        $voting->nama = $request->nama;
        $voting->link = $request->link;
        $voting->status = $request->status;
        $voting->tanggal_mulai = $request->tanggal_mulai;
        $voting->tanggal_akhir = $request->tanggal_akhir;
        $voting->sistem = $request->sistem;
        $voting->keterangan = $request->keterangan;

        if (isset($request->gambar)) {
            $request->validate([
                'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:3000',
            ]);
            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move($this->folder,$nama_file);
            deletefile($this->folder.'/'.$voting->gambar);
            $voting->gambar = $nama_file;
        }

        $voting->save();

        return back()->with('ts','Voting berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $voting = Voting::find($id);
        deletefile($this->folder.'/'.$voting->gambar);
        $voting->delete();
        
        return back()->with('te','Voting berhasil dihapus');
    }
}
