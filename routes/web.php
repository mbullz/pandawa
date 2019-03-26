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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'HomeController@index');

Route::get('/login', 'UserController@login');
Route::post('/login', 'UserController@doLogin');

Route::get('/register', 'UserController@register');
Route::post('/register', 'UserController@doRegister');

Route::get('/bookings/create/{date?}', 'BookingController@create');

Route::resources([
	'bookings'	=> 'BookingController',
	'payments'	=> 'PaymentController',
]);
