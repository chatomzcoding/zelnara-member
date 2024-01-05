<?php

namespace Modules\Zelnarawedding\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Superadmin\Entities\Layanan;

class Weddingtemplate extends Model
{
    use HasFactory;

    protected $table = 'wedding_template';

    protected $guarded = [];
    
    function layanan(){
        return $this->belongsTo(Layanan::class);
    }

    function wedding(){
        return $this->hasMany(Wedding::class);
    }
}
