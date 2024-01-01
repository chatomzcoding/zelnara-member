<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Superadmin\Entities\Datapokok;

class HomepageController extends Controller
{
    function index(){
        return view('welcome');
    }
}
