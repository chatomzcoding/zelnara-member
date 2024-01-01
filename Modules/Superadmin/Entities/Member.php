<?php

namespace Modules\Superadmin\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $table = 'member';

    protected $guarded = [];

    function user(){
        return $this->belongsTo(User::class);
    }
    
}
