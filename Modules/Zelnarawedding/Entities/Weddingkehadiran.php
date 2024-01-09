<?php

namespace Modules\Zelnarawedding\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Weddingkehadiran extends Model
{
    use HasFactory;

    protected $table = 'wedding_kehadiran';

    protected $guarded = [];
    
    function wedding(){
        return $this->belongsTo(Wedding::class);
    }
}
