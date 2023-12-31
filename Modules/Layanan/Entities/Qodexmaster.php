<?php

namespace Modules\Layanan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Superadmin\Entities\Layanan;
use Modules\Superadmin\Entities\Member;

class Qodexmaster extends Model
{
    use HasFactory;

    protected $table = 'qodex_master';

    protected $guarded = [];

    function getUkuran() {
        $ukuran = (!is_null($this->ukuran)) ? $this->ukuran : 100 ;
        return $ukuran;
    }

    function layanan(){
        return $this->belongsTo(Layanan::class);
    }

    function member(){
        return $this->belongsTo(Member::class);
    }
}
