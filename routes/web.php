<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [\App\Http\Controllers\HOmeController::class, 'index'])->name('home');
Route::get('/profile', [\App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::patch('/update-profile/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('update.profile');
Route::patch('/update-photo-profile/{id}', [\App\Http\Controllers\UserController::class, 'updatePhoto'])->name('update.photo');
Route::delete('/delete-photo-profile/{id}', [\App\Http\Controllers\UserController::class, 'destroyPhoto'])->name('delete.photo');

Route::group(['middleware' => 'auth'], function() {
    Route::group([
        'prefix'        => 'user' ,
        'as'            => 'user.',      
        'middleware'    => 'role:pengguna',
    ], function(){
        Route::get('indekos', [\App\Http\Controllers\Pengguna\IndekosController::class, 'index'])->name('indekos');
        Route::get('indekos/{id}', [\App\Http\Controllers\Pengguna\IndekosController::class, 'show'])->name('indekos.show');
        Route::resource('favorite', \App\Http\Controllers\Pengguna\FavoriteController::class, array('except' => array('create', 'edit', 'update')));
    });

    Route::group([
        'prefix'        => 'owner' ,
        'as'            => 'owner.',      
        'middleware'    => 'role:pemilik',
    ], function(){
       Route::resource('indekos', \App\Http\Controllers\Pemilik\IndekosController::class, array('except' => array('destroy')));
       Route::resource('foto-indekos', \App\Http\Controllers\Pemilik\ImageController::class, array('except' => array('index', 'create', 'edit')));        
    });

    Route::group([
        'prefix'        => 'admin' ,
        'as'            => 'admin.',      
        'middleware'    => 'role:admin',
    ], function(){
        Route::resource('user', \App\Http\Controllers\UserController::class, array('except' => array('store', 'edit', 'destroy')));
        Route::resource('facility', \App\Http\Controllers\Admin\FacilityController::class, array('except' => array('create', 'edit', 'show')));
        Route::resource('condition', \App\Http\Controllers\Admin\ConditionController::class, array('except' => array('create', 'edit', 'show')));
    });
});


