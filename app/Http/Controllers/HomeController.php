<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index(){
        $user = Auth::user();
        switch ($user->level) {
            case 'superadmin':
                return redirect('/superadmin');
                break;
            
            default:
                die('dashboard');
                break;
        }
    }
}
