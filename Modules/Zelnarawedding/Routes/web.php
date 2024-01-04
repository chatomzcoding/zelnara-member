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
    Route::prefix('zelnarawedding')->group(function() {
        Route::get('/', 'ZelnaraweddingController@index');

        Route::resource('weddingtemplate', WeddingtemplateController::class);
    });
});
