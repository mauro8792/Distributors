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
Route::resource('commerces', 'CommerceController');
Route::resource('employees', 'EmployeeController');
//Route::resource('products', 'ProductController');
Route::prefix('/productos')->name('products.')->group(function(){
    Route::get('/', 'ProductController@index')
        ->name('index');
});
Route::resource('sales', 'SaleController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
