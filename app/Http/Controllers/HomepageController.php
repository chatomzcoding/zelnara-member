<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Superadmin\Entities\Datapokok;

class HomepageController extends Controller
{
    function index(){
        return view('welcome');
    }
    
    // ZELNARA LINK
    
    function link(){
        return view('zelnara.link.index');
    }
    function linkurl($url){
        return view('zelnara.link.show',compact('url'));
    }
}
