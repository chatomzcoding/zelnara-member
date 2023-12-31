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
    'member'
])->group(function () {
    Route::prefix('member')->group(function() {
        Route::get('/', 'MemberController@index');
        Route::get('/layanan', 'MemberController@layanan');
        Route::get('/layanan/{kode}', 'MemberController@layananshow');
        Route::post('/', 'MemberController@store');

        // LAYANAN
        Route::resource('layananlink',LayananlinkController::class);
        Route::resource('layananvoting',LayananvotingController::class);
        Route::resource('layananwedding',LayananweddingController::class);
    });
});
