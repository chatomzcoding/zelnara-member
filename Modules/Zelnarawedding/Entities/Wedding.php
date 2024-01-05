<?php

namespace Modules\Zelnarawedding\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Superadmin\Entities\Layanan;
use Modules\Superadmin\Entities\Member;

class Wedding extends Model
{
    use HasFactory;

    protected $table = 'wedding';

    protected $guarded = [];
    
    function layanan(){
        return $this->belongsTo(Layanan::class);
    }

    function member(){
        return $this->belongsTo(Member::class);
    }

    function weddingtemplate(){
        return $this->belongsTo(Weddingtemplate::class);
    }
    
}
