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
    return view('maindoors.blades.home');
});

Route::get('/home', function () {
    return view('maindoors.blades.home');
});

Route::get('/daututuvan', function () {
    return view('maindoors.blades.daututuvan');
});

Route::get('/dangtin', function () {
    return view('maindoors.blades.dang-tin');
});

Route::get('/noithat', function () {
    return view('maindoors.blades.noithat');
});

Route::get('/sanphamnoithatvlxd', function () {
    return view('maindoors.blades.sanphamnoithatvlxd');
});

Route::get('/thuevachothue', function () {
    return view('maindoors.blades.thuevachothue');
});

Route::get('/tintucbds', function () {
    return view('maindoors.blades.tintucbds');
});

Route::get('/trangsanpham', function () {
    return view('maindoors.blades.trang_san_pham');
});

Route::get('/vatlieuxaydung', function () {
    return view('maindoors.blades.vatlieuxaydung');
});



/*Ngân Lượng Checkout V2.0*/

Route::get('nganluong','NganLuongController@index');
Route::post('nganluong','NganLuongController@indexpost');
Route::get('nlreceiver','NganLuongController@nlReceiver')->name('nlReceiver');

/*Ngân Lượng CheckOut V3.1*/

Route::get('nganluongv3','NganLuongV3Controller@getNLv3');
Route::post('nganluongv3','NganLuongV3Controller@postNLv3')->name('postNLv3');
Route::post('nlreceiverv3','NganLuongV3Controller@nlReceiverV3');


Route::get('getIdUser',function (){
//    $idUsers = DB::table('users')->pluck('id');
    $orderIds = DB::table('orders')->pluck('id')->toArray();
    dd($orderIds);
});
//Route::get('get',function (){
//    $idUsers = DB::table('users')->pluck('id');
//});
;

