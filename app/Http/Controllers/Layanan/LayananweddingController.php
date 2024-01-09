<?php

namespace App\Http\Controllers\Layanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Modules\Zelnarawedding\Entities\Weddingkehadiran;

class LayananweddingController extends Controller
{
    function store(Request $request){
        $s = (isset($request->s)) ? $request->s : 'store' ;

        switch ($s) {
            case 'kehadiran':
                $kehadiran = New Weddingkehadiran;
                $kehadiran->wedding_id = Crypt::decryptString($request->wedding_id);
                $kehadiran->nama = $request->nama;
                $kehadiran->jumlah = $request->jumlah;
                $kehadiran->status = $request->status;
                $kehadiran->save();

                return $kehadiran;
                break;
            
            default:
                # code...
                break;
        }
    }
}
