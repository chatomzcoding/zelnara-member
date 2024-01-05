<?php

namespace Modules\Layanan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Superadmin\Entities\Layanan;
use Modules\Superadmin\Entities\Member;

class Voting extends Model
{
    use HasFactory;

    protected $table = 'voting';

    protected $guarded = [];

    function getTanggal(){
        $tanggal = date_indo($this->tanggal_mulai).' - '.date_indo($this->tanggal_akhir);
        return $tanggal;
    }

    function statusTanggal(){
        $status = FALSE;
        $tanggalmulai = strtotime($this->tanggal_mulai);
        if (time() >= $tanggalmulai) {
            $status = TRUE;
        }
        return $status;
    }

    function layanan(){
        return $this->belongsTo(Layanan::class);
    }

    function member(){
        return $this->belongsTo(Member::class);
    }

    function votingpilihan(){
        return $this->hasMany(Votingpilihan::class);
    }
}
