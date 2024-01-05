<?php

namespace Modules\Superadmin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Layanan\Entities\Qodexmaster;
use Modules\Layanan\Entities\Voting;
use Modules\Zelnaralink\Entities\Linkmaster;
use Modules\Zelnarawedding\Entities\Weddingtemplate;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    protected $guarded = [];

    function linkmaster(){
        return $this->hasMany(Linkmaster::class);
    }

    function qodexmaster(){
        return $this->hasMany(Qodexmaster::class);
    }

    function weddingtemplate(){
        return $this->hasMany(Weddingtemplate::class);
    }

    function voting(){
        return $this->hasMany(Voting::class);
    }
}
