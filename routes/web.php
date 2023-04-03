<?php

use Illuminate\Support\Facades\Route;

Route::get('/reg_form', function () {
    return view('auth_form');
})->name('reg_form')->middleware('NotAuth');

Route::get('/', function () {
    return view('auth_form');
})->name('reg_form')->middleware('NotAuth');

Route::get('/main', function () {
    return view('main');
})->name('main')->middleware('IsAuth');

Route::post('/reg', 'App\Http\Controllers\UserController@reg')->name('check_reg');

Route::post('/auth', 'App\Http\Controllers\UserController@auth')->name('check_auth');

Route::get('/exit', 'App\Http\Controllers\UserController@exit')->name('exit');

Route::get('/main/videocards', function () {
    return view('videocards');
})->name('videocards')->middleware('IsAuth');;

Route::get('/test', 'App\Http\Controllers\UserController@test')->name('test');

