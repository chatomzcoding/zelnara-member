<?php

namespace Modules\Superadmin\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Superadmin\Entities\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $member = Member::all();
        $user   = User::doesntHave('member')->get();
        return view('superadmin::member.index', compact('member','user'));
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
        $member = New Member;
        $member->user_id = $request->user_id;
        $member->nama = $request->nama;
        $member->alamat = $request->alamat;
        $member->telp = $request->telp;
        $member->email = $request->email;
        $member->level = $request->level;
        $member->save();

        return back()->with('ts','Member berhasil ditambahkan');
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
        $member = Member::find($request->id);
        $member->nama = $request->nama;
        $member->alamat = $request->alamat;
        $member->telp = $request->telp;
        $member->email = $request->email;
        $member->level = $request->level;
        $member->save();

        return back()->with('ts','Member berhasil diperbaharui');
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
