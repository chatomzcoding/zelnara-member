<?php

namespace Modules\Superadmin\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Layanan\Entities\Qodexmaster;
use Modules\Zelnaralink\Entities\Linkmaster;

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
}
