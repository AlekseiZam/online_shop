<?php

use Illuminate\Support\Facades\Route;

Route::get('/reg_form', function () {
    return view('auth_form');
})->name('reg_form')->middleware('NotAuth');

Route::get('/main', function () {
    return view('main');
})->name('main')->middleware('IsAuth');

Route::post('/reg', 'App\Http\Controllers\UserController@reg')->name('check_reg');
Route::post('/auth', 'App\Http\Controllers\UserController@auth')->name('check_auth');
Route::get('/exit', 'App\Http\Controllers\UserController@exit')->name('exit')->middleware('IsAuth');;

Route::get('/', \App\Http\Controllers\Main\IndexController::class)->name('index')->middleware('Admin');
Route::resource('employess', \App\Http\Controllers\EmployeeController::class)->middleware('Admin');

Route::post('/goods/create2', 'App\Http\Controllers\GoodController@create2')->name('create2')->middleware('Admin');
Route::resource('goods', \App\Http\Controllers\GoodController::class)->middleware('Admin');

Route::prefix('main')->middleware('IsAuth')->group(function (){
    Route::get('videocards', '\App\Http\Controllers\Products\ProductController@videocard')->name('videocards')->middleware('IsAuth');
});

Route::post('/add-to-cart', 'App\Http\Controllers\CartController@addToCart')->name('addToCart')->middleware('IsAuth');

Route::get('/main/cart', 'App\Http\Controllers\CartController@index')->name('toCart')->middleware('IsAuth');

Route::post('/delGood', 'App\Http\Controllers\CartController@deleteGood')->name('delGood')->middleware('IsAuth');

Route::get('/main/order', 'App\Http\Controllers\OrderController@index')->name('toOrder')->middleware('IsAuth');

Route::post('/main/make_order', 'App\Http\Controllers\OrderController@make_order')->name('make_order')->middleware('IsAuth');

Route::get('/main/orders', '\App\Http\Controllers\OrderController@order_list')->name('order_list')->middleware('IsAuth');
