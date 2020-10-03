<?php

use Illuminate\Support\Facades\Route;

if(file_exists(storage_path('installed'))){
    $check = DB::table('settings')->where('id', 94)->first();
 
	if($check->value == 'Maintenance'){
		$middleware = ['installer','env'];
	}
	else{
		$middleware = ['installer'];
	}
}
else{
	$middleware = ['installer'];
}
$middleware = ['installer'];

Route::get('/maintance','Web\IndexController@maintance');

Route::group(['namespace' => 'Web','middleware' => ['installer']], function () {

});
Route::group(['namespace' => 'Web','middleware' => $middleware], function () {
	Route::get('general_error/{msg}', function($msg) {
		 return view('errors.general_error',['msg' => $msg]);
    });

    Route::get('/','IndexController@paymentsgateway');
    Route::get('/services','IndexController@paymentsgateway');
        Route::get('/ajax','IndexController@ajax');
        Route::get('/cancel','IndexController@cancel');
        Route::get('/success','IndexController@success');


		Route::get('/index1','IndexController@index');
		Route::post('/change_language', 'WebSettingController@changeLanguage');
		Route::post('/change_currency', 'WebSettingController@changeCurrency');
		Route::post('/addToCart', 'CartController@addToCart');
		Route::post('/modal_show', 'ProductsController@ModalShow');
		Route::get('/deleteCart', 'CartController@deleteCart');
		Route::get('/viewcart', 'CartController@viewcart');
		Route::get('/editcart/{id}/{slug}', 'CartController@editcart');
		Route::post('/updateCart', 'CartController@updateCart');
		Route::post('/updatesinglecart', 'CartController@updatesinglecart');
		Route::get('/cartButton', 'CartController@cartButton');


		//news section










	});

	Route::get('/test', 'Web\IndexController@test1');

	// .................My Routes..........................//

	Route::get('/getmonths', 'ChartController@getMonths')->name('getMonths');
	Route::get('/getMonthlyCompletedOrdersCount', 'ChartController@getMonthlyCompletedOrdersCount')->name('getMonthlyCompletedOrdersCount');
	Route::get('/getMonthlyCancelledOrdersCount', 'ChartController@getMonthlyCancelledOrdersCount')->name('getMonthlyCancelledOrdersCount');
	Route::get('/getMonthlyReturnOrdersCount', 'ChartController@getMonthlyReturnOrdersCount')->name('getMonthlyReturnOrdersCount');
	Route::get('/getMonthlyOrdersData', 'ChartController@getMonthlyOrdersData')->name('getMonthlyOrdersData');
Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return 'Success';
    // return what you want
});
Route::get('/cache-clear', function () {
    $exitCode = Artisan::call('cache:clear');
    return 'Success';
    // return what you want
});

