<?php

namespace Modules\Superadmin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Superadmin\Entities\Datapokok;

class DatapokokController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    protected $folder = 'img/sistem';

    public function index()
    {
        $datapokok = Datapokok::first();
        return view('superadmin::sistem.datapokok.index', compact('datapokok'));
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
        //
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
        $datapokok = Datapokok::find($id);
        $datapokok->nama = $request->nama;
        $datapokok->deskripsi = $request->deskripsi;
        $datapokok->footer = $request->footer;

        if (isset($request->logo)) {
            $request->validate([
                'logo' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            $file = $request->file('logo');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move($this->folder,$nama_file);
            deletefile($this->folder.'/'.$datapokok->logo);
            $datapokok->logo = $nama_file;
        }

        if (isset($request->favicon)) {
            $request->validate([
                'favicon' => 'required|file|image|mimes:jpeg,png,jpg|max:1000',
            ]);
            $file = $request->file('favicon');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move($this->folder,$nama_file);
            deletefile($this->folder.'/'.$datapokok->favicon);
            $datapokok->favicon = $nama_file;
        }

        $datapokok->save();
        return back()->with('ts','Data Berhasil tersimpan');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
