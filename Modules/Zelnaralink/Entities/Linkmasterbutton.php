<?php

namespace Modules\Zelnaralink\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Linkmasterbutton extends Model
{
    use HasFactory;

    protected $table = 'link_master_button';

    protected $guarded = [];

    function linkmaster(){
        return $this->belongsTo(Linkmaster::class);
    }
}
