<?php

namespace Modules\Superadmin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Layanan\Entities\Voting;
use Modules\Superadmin\Entities\Datapokok;
use Modules\Superadmin\Entities\Layanan;
use Modules\Superadmin\Entities\Member;
use Modules\Superadmin\Entities\Visitor;
use Modules\Zelnaralink\Entities\Linkmaster;

class SuperadminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $tanggal    = tgl_sekarang();
        $visit      = Visitor::sum('hits');
        $visitharian      = Visitor::whereDate('tanggal',$tanggal)->sum('hits');
        $visitor    = Visitor::count();
        $visitorharian    = Visitor::whereDate('tanggal',$tanggal)->count();
        $member     = Member::count();
        $layanan    = Layanan::count();
        $statistik = [
            'visit' => $visit,
            'visit-harian' => $visitharian,
            'visitor' => $visitor,
            'visitor-harian' => $visitorharian,
            'layanan' => $layanan,
            'member' => $member  
        ];
        $layanan    = Layanan::latest()->limit(3)->get();
        $datapokok  = Datapokok::first();
        $voting     = Voting::latest()->limit(3)->get();
        $link       = Linkmaster::latest()->limit(3)->get();
        return view('superadmin::index', compact('statistik','layanan','datapokok','voting','link'));
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
        //
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
