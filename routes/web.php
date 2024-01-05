<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::domain('https://link.zelnara.com')->group(function () {
    Route::get('/login', function () {
        return redirect('/');
    });
    Route::get('/', [HomepageController::class,'link']);
    Route::get('/{url}', [HomepageController::class,'linkurl']);
});
Route::domain('https://voting.zelnara.com')->group(function () {
    Route::get('/login', function () {
        return redirect('/');
    });
    Route::get('/', [HomepageController::class,'voting']);
    Route::get('/{url}', [HomepageController::class,'votingshow']);
});

Route::domain('https://member.zelnara.com')->group(function () {
    Route::get('/', [HomepageController::class,'index']);
});

// Route::get('/', [HomepageController::class,'index']);

// PAGE REDIRECT
Route::get('/page/{page}', [HomepageController::class,'page']);

// PENGUJIAN
Route::get('/dev/link/{url}', [HomepageController::class,'linkurl']);
Route::get('/dev/voting/{url}', [HomepageController::class,'votingshow']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');
});