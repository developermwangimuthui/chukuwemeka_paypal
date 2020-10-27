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

use App\Models\Service;

Route::get('/', function () {
    $services = Service::all();
    return view('welcome',compact('services'));
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
Route::get('/home', 'HomeController@index')->name('home');

// //...............................Services...........................//
Route::get('/service/index', 'ServiceController@index')->name('service.index');
Route::post('/service/store', 'ServiceController@store')->name('service.store');
Route::get('/service/edit/{id}', 'ServiceController@edit')->name('service.edit');
Route::post('/service/update/{id}', 'ServiceController@update')->name('service.update');
Route::get('/service/destroy/{id}', 'ServiceController@destroy')->name('service.destroy');

// //...............................Customers...........................//
Route::get('/customer/index', 'CustomerController@index')->name('customer.index');
Route::post('/customer/store', 'CustomerController@store')->name('customer.store');
Route::get('/customer/edit/{id}', 'CustomerController@edit')->name('customer.edit');
Route::post('/customer/update', 'CustomerController@update')->name('customer.update');
Route::get('/customer/destroy/{id}', 'CustomerController@destroy')->name('customer.destroy');
// //...............................Orders...........................//
Route::get('/order/index', 'OrderController@index')->name('order.index');
Route::post('/order/store', 'OrderController@store')->name('order.store');
Route::get('/order/edit/{id}', 'OrderController@edit')->name('order.edit');
Route::get('/order/show/{id}', 'OrderController@show')->name('order.show');
Route::post('/order/update/{id}', 'OrderController@update')->name('order.update');
Route::post('/order/order_status_update/{id}', 'OrderController@order_status_update')->name('order_status.update');
Route::get('/order/destroy/{id}', 'OrderController@destroy')->name('order.destroy');



//..........................User Management ............................//

Route::resource('roles','RoleController');
Route::resource('users','UserController');

//..........................Settings............................//

Route::get('/settings/index', 'SettingsController@index')->name('settings.index');
Route::post('/settings/store', 'SettingsController@store')->name('settings.store');
Route::get('/settings/edit/{id}', 'SettingsController@edit')->name('settings.edit');
Route::post('/settings/update', 'SettingsController@update')->name('settings.update');
Route::get('/settings/destroy/{id}', 'SettingsController@destroy')->name('settings.destroy');


//..........................Download Pdf............................//
Route::get('/downloadPdf/{id}', 'OrderController@downloadPdf')->name('downloadPdf');


//..........................Reports..........................................//

Route::get('/customer/reports', 'CustomerController@reports')->name('customer.reports');
Route::get('/order/reports', 'OrderController@reports')->name('order.reports');

});

//..........................Paypal..........................................//

Route::get('/execute_payment/{amount}/{currency}/{service}/{firstname}/{lastname}/{email}/{service_name_input}', 'PaymentController@execute_payment')->name('execute_payment');
Route::post('/create_payment', 'PaymentController@create_payment')->name('create_payment');
Route::get('/cancel_payment', 'PaymentController@cancel_payment')->name('cancel_payment');


//............................Chart.................................//


Route::get('/getmonths', 'ChartController@getMonths')->name('getMonths');
Route::get('/getMonthlyCompletedOrdersCount', 'ChartController@getMonthlyCompletedOrdersCount')->name('getMonthlyCompletedOrdersCount');
Route::get('/getMonthlyCancelledOrdersCount', 'ChartController@getMonthlyCancelledOrdersCount')->name('getMonthlyCancelledOrdersCount');
Route::get('/getMonthlyReturnOrdersCount', 'ChartController@getMonthlyReturnOrdersCount')->name('getMonthlyReturnOrdersCount');
Route::get('/getMonthlyOrdersData', 'ChartController@getMonthlyOrdersData')->name('getMonthlyOrdersData');


//..............................Cache............................................//
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
Route::get('/view-clear', function () {
    $exitCode = Artisan::call('view:clear');
    return 'Success';
    // return what you want
});
Route::get('/route-clear', function () {
    $exitCode = Artisan::call('route:clear');
    return 'Success';
    // return what you want
});
