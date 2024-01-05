<?php

namespace Modules\Superadmin\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Layanan\Entities\Qodexmaster;
use Modules\Layanan\Entities\Voting;
use Modules\Zelnaralink\Entities\Linkmaster;
use Modules\Zelnarawedding\Entities\Wedding;

class Member extends Model
{
    use HasFactory;

    protected $table = 'member';

    protected $guarded = [];

    function user(){
        return $this->belongsTo(User::class);
    }

    function linkmaster(){
        return $this->hasMany(Linkmaster::class);
    }

    function qodexmaster(){
        return $this->hasMany(Qodexmaster::class);
    }

    function wedding(){
        return $this->hasMany(Wedding::class);
    }

    function voting(){
        return $this->hasMany(Voting::class);
    }
}
