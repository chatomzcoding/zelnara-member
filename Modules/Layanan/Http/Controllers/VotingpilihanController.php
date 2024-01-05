<?php

namespace Modules\Layanan\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Layanan\Entities\Votingpilihan;

class VotingpilihanController extends Controller
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
        $votingpilihan = New Votingpilihan;
        $votingpilihan->voting_id = $request->voting_id;
        $votingpilihan->nama = $request->nama;
        $votingpilihan->urutan = $request->urutan;
        $votingpilihan->jumlah = $request->jumlah;
        $votingpilihan->keterangan = $request->keterangan;
        $request->validate([
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:3000',
        ]);
        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move($this->folder,$nama_file);
        $votingpilihan->gambar = $nama_file;

        $votingpilihan->save();

        return back()->with('ts','Voting Pilihan berhasil ditambahkan');
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
        $votingpilihan = Votingpilihan::find($request->id);
        $votingpilihan->nama = $request->nama;
        $votingpilihan->urutan = $request->urutan;
        $votingpilihan->keterangan = $request->keterangan;

        if (isset($request->gambar)) {
            $request->validate([
                'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:3000',
            ]);
            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move($this->folder,$nama_file);
            deletefile($this->folder.'/'.$votingpilihan->gambar);
            $votingpilihan->gambar = $nama_file;
        }

        $votingpilihan->save();

        return back()->with('ts','Voting Pilihan berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $votingpilihan = Votingpilihan::find($id);
        deletefile($this->folder.'/'.$votingpilihan->gambar);
        $votingpilihan->delete();

        return back()->with('ts','Voting Pilihan berhasil dihapus');
    }
}
