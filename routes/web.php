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
Route::get('nlreceiverv3','NganLuongV3Controller@nlReceiverV3');


Route::get('getIdUser',function (){
//    $idUsers = DB::table('users')->pluck('id');
    $orderIds = DB::table('orders')->pluck('id')->toArray();
    dd($orderIds);
});
//Route::get('get',function (){
//    $idUsers = DB::table('users')->pluck('id');
//});
;

// Laravel Log View
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('products','ProductController@index');
Route::get('product/{id}','ProductController@show');


// View Light Admin
Route::get('lightadmin',function (){
    return view('light-admin.master');
})->name('lightadmin');
Route::get('dashboard',function (){
    return view('light-admin.blades.dashboard');
});
Route::get('user',function (){
    return view('light-admin.blades.user');
});
Route::get('icons',function (){
    return view('light-admin.blades.icons');
});
Route::get('maps',function (){
	return view('light-admin.blades.maps');
});
Route::get('table',function (){
	return view('light-admin.blades.table');
});
Route::get('template',function (){
	return view('light-admin.blades.template');
});
Route::get('notifications',function (){
	return view('light-admin.blades.notifications');
});
Route::get('upgrade',function (){
	return view('light-admin.blades.upgrade');
});
Route::get('typography',function (){
	return view('light-admin.blades.typography');
});

// AdminLTE
//Route::get('adminlte',function (){
//    return view('adminlte.app');
//});
//Route::get('dashboard',function (){
//    return view('adminlte.pages.dashboard');
//});
//Route::get('userprofile',function (){
//    return view('adminlte.pages.userprofile');
//});
//Route::get('login',function (){
//    return view('adminlte.pages.login');
//});
//Route::get('register',function (){
//    return view('adminlte.pages.register');
//});


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('homefront');
Route::get('503','ErrorController@error503')->name('error503');
Route::get('404','ErrorController@error404')->name('error404');
Route::group(['prefix' => 'admin'],function (){
    Route::get('login','Admin\LoginController@getLogin')->name('admin.login.getLogin');
    Route::post('login','Admin\LoginController@postLogin')->name('admin.login.postLogin');
    Route::get('logout', 'Admin\LoginController@getLogout')->name('admin.login.getLogout');
    Route::get('register','Admin\RegisterController@getRegister')->name('admin.register.getRegister');
    Route::post('register','Admin\RegisterController@postRegister')->name('admin.register.postRegister');
    Route::get('confirm','Admin\RegisterController@getConfirm')->name('admin.register.getConfirm');
    Route::get('forgot','Admin\ForgotPasswordController@getForgotPassword')->name('admin.forgot.getForgotPassword');
    Route::post('forgot','Admin\ForgotPasswordController@postForgotPassword')->name('admin.forgot.postForgotPassword');
    Route::get('checkforgot/{idForgot}/{md5Forgot}','Admin\ForgotPasswordController@checkForgot')->name('admin.forgot.checkForgot');
    Route::post('resetpassword','Admin\ForgotPasswordController@resetPassword')->name('admin.resetpassword.resetPassword');
    Route::get('dashboard','Admin\DashboardController@getDashboard')->middleware('adminlte')->name('admin.dashboard.getDashboard');
    Route::get('usermanager','Admin\UserManagermentController@getUser')->middleware('adminlte')->name('admin.dashboard.getUser');
    Route::get('deleteuser/{id}','Admin\UserManagermentController@getDeleteUser')->middleware('adminlte')->name('admin.dashboard.getDeleteUser');
    Route::get('userprofile/{id}','Admin\UserManagermentController@getUserProfile')->middleware('adminlte')->name('admin.dashboard.getUserProfile');
    Route::get('userlevel/level/{param}','Admin\UserManagermentController@getUserLevel')->middleware('adminlte')->name('admin.dashboard.getUserLevel');
    Route::get('newuser','Admin\UserManagermentController@getNewUser')->middleware('adminlte')->name('admin.dashboard.getNewUser');
    Route::post('newuser','Admin\UserManagermentController@postNewUser')->middleware('adminlte')->name('admin.dashboard.postNewUser');
//    Route::get('usermanager/{id}','Admin\UserManagermentController@getUser')->middleware('adminlte')->name('admin.dashboard.getUser');
});



Auth::routes();

Route::get('/home', 'HomeController@index');


// Check logs
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


// Test
Route::get('api/users','APIController@getAllUsers');
Route::get('products', 'TestController@getAllProduct');
Route::get('orders', 'TestController@getAllOrder');
Route::get('users','TestController@getAllUser');