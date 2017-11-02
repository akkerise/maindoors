<?php
use Illuminate\Support\Facades\Redis;


Route::get('/', function () {
    return view('metronic.blocks.index');
});

Route::get('getIdUser', function () {
//    $idUsers = DB::table('users')->pluck('id');
    $orderIds = DB::table('orders')->pluck('id')->toArray();
    dd($orderIds);
});

// Laravel Log View
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('products', 'ProductController@index');
Route::get('product/{id}', 'ProductController@show');


// View Light Admin
Route::get('lightadmin', function () {return view('light-admin.master');})->name('lightadmin');
Route::get('dashboard', function () {return view('light-admin.blades.dashboard');});
Route::get('user', function () {return view('light-admin.blades.user');});
Route::get('icons', function () {return view('light-admin.blades.icons');});
Route::get('maps', function () {return view('light-admin.blades.maps');});
Route::get('table', function () {return view('light-admin.blades.table');});
Route::get('template', function () {return view('light-admin.blades.template');});
Route::get('notifications', function () {return view('light-admin.blades.notifications');});
Route::get('upgrade', function () {return view('light-admin.blades.upgrade');});
Route::get('typography', function () {return view('light-admin.blades.typography');});

// AdminLTE
//Route::get('adminlte',function (){return view('adminlte.app');});
//Route::get('dashboard',function (){return view('adminlte.pages.dashboard');});
//Route::get('userprofile',function (){return view('adminlte.pages.userprofile');});
//Route::get('login',function (){return view('adminlte.pages.login');});
//Route::get('register',function (){return view('adminlte.pages.register');});


//Auth::routes();

Route::get('home', 'HomeController@index')->name('homefront');
Route::get('503', 'ErrorController@error503')->name('error503');
Route::get('404', 'ErrorController@error404')->name('error404');

Route::group(['prefix' => 'admin'], function () {

    Route::get('login', 'Admin\LoginController@getLogin')->name('admin.login.getLogin');
    Route::get('', 'Admin\LoginController@getLogin')->name('admin.login.getLogin');
    Route::post('login', 'Admin\LoginController@postLogin')->name('admin.login.postLogin');
    Route::get('logout', 'Admin\LoginController@getLogout')->name('admin.login.getLogout');

    Route::get('register', 'Admin\RegisterController@getRegister')->name('admin.register.getRegister');
    Route::post('register', 'Admin\RegisterController@postRegister')->name('admin.register.postRegister');
    Route::get('confirm', 'Admin\RegisterController@getConfirm')->name('admin.register.getConfirm');

    Route::get('forgot', 'Admin\ForgotPasswordController@getForgotPassword')->name('admin.forgot.getForgotPassword');
    Route::post('forgot', 'Admin\ForgotPasswordController@postForgotPassword')->name('admin.forgot.postForgotPassword');
    Route::get('checkforgot/{idForgot}/{md5Forgot}', 'Admin\ForgotPasswordController@checkForgot')->name('admin.forgot.checkForgot');
    Route::post('resetpassword', 'Admin\ForgotPasswordController@resetPassword')->name('admin.resetpassword.resetPassword');

    Route::get('checkregister/{idNewUser}/{md5EmailNewUser}', 'Admin\RegisterController@checkActiveRegister')->name('admin.active.checkActiveRegister');

    Route::group(['middleware' => 'adminlte'], function () {
        Route::get('dashboard', 'Admin\DashboardController@getDashboard')->name('admin.dashboard.getDashboard');

        Route::get('usermanager', 'Admin\UserManagermentController@getUser')->name('admin.dashboard.getUser');
        Route::get('usermanager/{id}', 'Admin\UserManagermentController@getUserId')->name('admin.dashboard.getUserId');
        Route::get('usermanagerajax/{id}', 'Admin\UserManagermentController@getUserIdCallAjax')->name('admin.dashboard.getUserIdCallAjax');
        // Route::get('usermanager/alluser', 'Admin\UserManagermentController@getAllUser')->name('admin.manager.getAllUser');
        Route::post('usermanager/{id}', 'Admin\UserManagermentController@postUpdateUser')->name('admin.dashboard.postUpdateUser');

        Route::get('deleteuser/{id}', 'Admin\UserManagermentController@getDeleteUser')->name('admin.dashboard.getDeleteUser');

//        Route::get('updateuser/{id}', 'Admin\UserManagermentController@getUpdateUser')->name('admin.dashboard.getUpdateUser');
        // Route::post('updateuser/{id}', 'Admin\UserManagermentController@postUpdateUser')->name('admin.dashboard.postUpdateUser');

        Route::get('userprofile/{id}', 'Admin\UserManagermentController@getUserProfile')->name('admin.dashboard.getUserProfile');
        Route::get('userlevel/level/{param}', 'Admin\UserManagermentController@getUserLevel')->name('admin.dashboard.getUserLevel');
        Route::get('newuser', 'Admin\UserManagermentController@getNewUser')->name('admin.dashboard.getNewUser');
        Route::post('newuser', 'Admin\UserManagermentController@postNewUser')->name('admin.dashboard.postNewUser');



        Route::get('/redirect', 'Admin\SocialAdminController@redirect')->name('redirectFacebook');
        Route::get('/callback', 'SocialAuthController@callback');
    });
//    Route::get('usermanager/{id}','Admin\UserManagermentController@getUser')->middleware('adminlte')->name('admin.dashboard.getUser');
});


Auth::routes();

Route::get('/home', 'HomeController@index');


// Check logs
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


// Test Repository Pattern
Route::get('api/users', 'APIController@getAllUsers');
Route::get('products', 'TestController@getAllProduct');
Route::get('orders', 'TestController@getAllOrder');
Route::get('users', 'TestController@getAllUser');
Route::get('customers', 'TestController@getAllCustomer');
Route::get('categories', 'TestController@getAllCategory');
Route::get('news', 'TestController@getAllNews');
Route::get('menus', 'TestController@getAllMenu');
Route::get('customfields', 'TestController@getAllCustomField');
Route::get('productcustomfields', 'TestController@getAllProductCustomField');
Route::get('instead/{nameModel}', 'TestController@getInstead');


// Test Redis
Route::get('redis', function () {
    $redis = Redis::connection();
    $valueUser = \App\User::all();
    $valueProduct = \App\Product::all();
    $valueProduct = json_encode($valueProduct);
    $valueUser = json_encode($valueUser);
    $redis->set('users', $valueUser);
    $redis->set('products', $valueProduct);
    $timeReCache = \Carbon\Carbon::now()->addMinute(5);
    dd($redis->get('products'));
//    echo $redis->get('product');
//    return response()->json($redis->get('product'));
});

Route::get('metronic', function(){
    return view('metronic.app');
});

Route::get('index', function (){
   return view('metronic.blocks.index');
})->name('metronic.home');
Route::get('metronic-blog', function (){
    return view('metronic.blocks.blog');
})->name('metronic.blog');

Route::get('test-api', function (){

});
Route::post('test-api', 'APIController@getAllUsers');