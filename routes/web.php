<?php

use Illuminate\Support\Facades\Route;

Route::get('/reg_form', function () {
    return view('auth_form');
})->name('reg_form');

Route::post('/reg', 'App\Http\Controllers\RegUserController@submit')->name('check_reg');
