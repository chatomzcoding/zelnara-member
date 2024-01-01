<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Superadmin\Entities\Datapokok;
use Modules\Zelnaralink\Entities\Linkmaster;

class HomepageController extends Controller
{
    function index(){
        return view('welcome');
    }

    function page($page){
        switch ($page) {
            case '404':
                return view('page.404');
                break;
            
            default:
            return redirect('/');
                break;
        }
    }
    
    // ZELNARA LINK
    
    function link(){
        return view('zelnara.link.index');
    }
    function linkurl($url){
        $linkmaster = Linkmaster::where('url',$url)->first();
        if (!$linkmaster) {
            return redirect('/page/404');
        }
        return view('zelnara.link.show',compact('linkmaster'));
    }
}
