<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/settings', 'SettingController@index')->name('settings.index');
	Route::post('/settings', 'SettingController@store')->name('settings.store');
	Route::resource('products', 'ProductController');
	Route::resource('customers', 'CustomerController');
	Route::resource('orders', 'OrderController');
	Route::resource('suppliers', 'SupplierController');
	Route::resource('employees', 'EmployeeController');

	Route::get('/cart', 'CartController@index')->name('cart.index');
	Route::post('/cart', 'CartController@store')->name('cart.store');
	Route::post('/cart/change-qty', 'CartController@changeQty');
	Route::delete('/cart/delete', 'CartController@delete');
	Route::delete('/cart/empty', 'CartController@empty');

	Route::get('/inventario', 'ProductController@exportPdf')->name('products-pdf');
	Route::get('/ordeneslistado', 'OrderController@exportordenesPdf')->name('ordenes-pdf');
	Route::get('/clientes', 'CustomerController@exportclientesPdf')->name('clientes-pdf');
	Route::get('/proveedores', 'SupplierController@exportproveedoresPdf')->name('proveedores-pdf');
	Route::get('/empleados', 'EmployeeController@exportempleadosPdf')->name('empleados-pdf');
});
