<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::group([
        'prefix'        => 'user' ,
        'as'            => 'user.',      
        'middleware'    => 'role:pengguna',
    ], function(){
        Route::get('indekos', [\App\Http\Controllers\Pengguna\IndekosController::class, 'index'])->name('indekos');
        Route::get('indekos/{id}', [\App\Http\Controllers\Pengguna\IndekosController::class, 'show'])->name('indekos.show');

        Route::resource('favorite', \App\Http\Controllers\Pengguna\FavoriteController::class);
    });

    Route::group([
        'prefix'        => 'owner' ,
        'as'            => 'owner.',      
        'middleware'    => 'role:pemilik',
    ], function(){
       Route::resource('indekos', \App\Http\Controllers\Pemilik\IndekosController::class);
        
    });

    Route::group([
        'prefix'        => 'admin' ,
        'as'            => 'admin.',      
        'middleware'    => 'role:admin',
    ], function(){
        Route::get('/page1', function () {
            return view('admin.index');
        })->name('home');
    });
});


