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
    return view('welcome');
});

Route::resource('distributors', 'DistributorController');
Route::prefix('/distribuidores')->name('distributors.')->group(function(){
    Route::get('/', 'DistributorController@index')->name('index');
});
Route::prefix('/distribuidores/nuevo')->name('distributors.create')->group(function(){
    Route::get('/', 'DistributorController@create')->name('create');
});

Route::resource('commerces', 'CommerceController');
Route::prefix('/comercios')->name('commerces.')->group(function(){
    Route::get('/', 'CommerceController@index')->name('index');
});
Route::prefix('/comercios/nuevo')->name('commerces.create')->group(function(){
    Route::get('/', 'CommerceController@create')->name('create');
});

Route::resource('employees', 'EmployeeController');
Route::prefix('/empleados')->name('employees.')->group(function(){
    Route::get('/', 'EmployeeController@index')->name('index');
});
Route::prefix('/empleados/nuevo')->name('employees.create')->group(function(){
    Route::get('/', 'EmployeeController@create')->name('create');
});

Route::resource('products', 'ProductController');
Route::prefix('/productos')->name('products.')->group(function(){
    Route::get('/', 'ProductController@index')->name('index');
});
Route::prefix('/productos/nuevo')->name('products.create')->group(function(){
    Route::get('/', 'ProductController@create')->name('create');
});

Route::resource('sales', 'SaleController');
Route::prefix('/ventas')->name('sales.')->group(function(){
    Route::get('/', 'SaleController@index')->name('index');
});
Route::prefix('/ventas/nueva')->name('sales.create')->group(function(){
    Route::get('/', 'SaleController@create')->name('create');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
