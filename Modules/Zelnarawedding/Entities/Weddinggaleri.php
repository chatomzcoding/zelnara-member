<?php

namespace Modules\Zelnarawedding\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Weddinggaleri extends Model
{
    use HasFactory;

    protected $table = 'wedding_galeri';

    protected $guarded = [];
    
    function wedding(){
        return $this->belongsTo(Wedding::class);
    }
}
