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
        'middleware'    => 'role:pencari',
    ], function(){
        Route::get('/page', function () {
            return view('pencari.index');
        })->name('pencari.home');
    });

    Route::group([
        'prefix'        => 'owner' ,
        'as'            => 'owner.',      
        'middleware'    => 'role:pemilik',
    ], function(){
        Route::get('/', function () {
            return view('pemilik.index');
        })->name('pemilik.home');
    });

    Route::group([
        'prefix'        => 'admin' ,
        'as'            => 'admin.',      
        'middleware'    => 'role:admin',
    ], function(){
        Route::get('/page1', function () {
            return view('admin.index');
        })->name('admin.home');
    });
});


