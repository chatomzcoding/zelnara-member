<?php

namespace Modules\Layanan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Votingpilihan extends Model
{
    use HasFactory;

    protected $table = 'voting_pilihan';

    protected $guarded = [];

    function voting(){
        return $this->belongsTo(Voting::class);
    }
}
