<?php

namespace Modules\Zelnaralink\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Linkmasterkatalog extends Model
{
    use HasFactory;

    protected $table = 'link_master_katalog';

    protected $guarded = [];

    function linkmaster(){
        return $this->belongsTo(Linkmaster::class);
    }
}
