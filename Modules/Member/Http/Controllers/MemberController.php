<?php

namespace Modules\Member\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Superadmin\Entities\Kategori;
use Modules\Superadmin\Entities\Layanan;
use Modules\Superadmin\Entities\Member;
use Modules\Zelnarawedding\Entities\Weddingtemplate;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('member::index', compact('user'));
    }

    public function layanan()
    {
        $user = User::find(Auth::user()->id);
        $layanan = Layanan::all();
        return view('member::layanan.index', compact('user','layanan'));
    }
    public function layananshow($kode)
    {
        $user = User::find(Auth::user()->id);
        $layanan = Layanan::where('kode',$kode)->first();
        if ($layanan) {
            switch ($kode) {
                case 'link':
                    $tema       = Kategori::where('label','link-tema')->get();
                    return view('member::layanan.link.index', compact('user','tema','layanan'));
                    break;
                case 'qodex':
                    return view('member::layanan.qodex.index', compact('user','layanan'));
                    break;
                case 'voting':
                    return view('member::layanan.voting.index', compact('user','layanan'));
                    break;
                case 'wedding':
                    $template = Weddingtemplate::all();
                    return view('member::layanan.wedding.index', compact('user','layanan','template'));
                    break;
                
                default:
                    # code...
                    break;
            }
        } else {
            return redirect('dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('member::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $member = Member::find($request->member_id);
        $member->nama = $request->nama;
        $member->alamat = $request->alamat;
        $member->telp = $request->telp;
        $member->email = $request->email;
        $member->save();

        return back()->with('ts','Member berhasil diperbaharui');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('member::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('member::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
 
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
