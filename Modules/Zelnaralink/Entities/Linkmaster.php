<?php

namespace Modules\Zelnaralink\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Superadmin\Entities\Member;

class Linkmaster extends Model
{
    use HasFactory;

    protected $table = 'link_master';

    protected $guarded = [];

    function getUrl(){
        $url = $this->url;
        $url = "link.zelnara.com/".$url;
        return $url;
    }

    function member() {
        return $this->belongsTo(Member::class);
    }

    function linkmasterbutton() {
        return $this->hasMany(Linkmasterbutton::class);
    }
}
