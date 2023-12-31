<?php

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

use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'superadmin'
])->group(function () {
    Route::prefix('superadmin')->group(function() {
        Route::get('/', 'SuperadminController@index');
        Route::resource('datapokok', DatapokokController::class);
        Route::resource('visitor', VisitorController::class);
        Route::resource('layanan', LayananController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('member', MemberController::class);
    });
});

