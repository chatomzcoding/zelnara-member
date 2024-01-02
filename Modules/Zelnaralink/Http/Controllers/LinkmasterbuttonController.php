<?php

namespace Modules\Zelnaralink\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Zelnaralink\Entities\Linkmasterbutton;

class LinkmasterbuttonController extends Controller
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
        $button = New Linkmasterbutton;
        $button->linkmaster_id = $request->linkmaster_id;
        $button->nama = $request->nama;
        $button->icon = $request->icon;
        $button->url = $request->url;
        $button->jumlah_klik = $request->jumlah_klik;
        $button->save();

        return back()->with('ts','Data Button berhasil ditambahkan');
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
        $button = Linkmasterbutton::find($request->id);
        $button->nama = $request->nama;
        $button->icon = $request->icon;
        $button->url = $request->url;
        $button->save();

        return back()->with('ts','Data Button berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Linkmasterbutton::find($id)->delete();

        return back()->with('ts','Data Button berhasil dihapus');
    }
}
