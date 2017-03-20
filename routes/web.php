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

Route::get('/', function () {
    return view('master');
});

Route::get('/home', function () {
    return view('maindoors.blades.home');
});

Route::get('/daututuvan', function () {
    return view('maindoors.blades.daututuvan');
});

Route::get('/dang-tin', function () {
    return view('maindoors.blades.dang-tin');
});

Route::get('/noithat', function () {
    return view('maindoors.blades.noithat');
});

Route::get('/sanphamnoithatvlxd', function () {
    return view('maindoors.blades.sanphamnoithatvlxd');
});