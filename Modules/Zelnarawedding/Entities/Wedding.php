<?php

namespace Modules\Zelnarawedding\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Superadmin\Entities\Layanan;

class Wedding extends Model
{
    use HasFactory;

    protected $table = 'wedding';

    protected $guarded = [];

    function layanan() {
        return $this->belongsTo(Layanan::class);
    }
    
}
