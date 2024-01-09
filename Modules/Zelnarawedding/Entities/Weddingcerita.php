<?php

namespace Modules\Zelnarawedding\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Weddingcerita extends Model
{
    use HasFactory;

    protected $table = 'wedding_cerita';

    protected $guarded = [];
    
    function wedding(){
        return $this->belongsTo(Wedding::class);
    }
}
