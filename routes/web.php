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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});




Route::prefix('home')->name('home')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');
});

// Distribuidora
Route::resource('distributors', 'DistributorController');
Route::prefix('/distribuidores')->name('distributors.')->group(function(){
    Route::get('/', 'DistributorController@index')->name('index');
    Route::get('/nuevo', 'DistributorController@create')->name('create');
    Route::delete('/delete/{id}','DistributorController@destroy')->name('destroy');      
});

// Comercios
Route::resource('commerces', 'CommerceController');
Route::prefix('/comercios')->name('commerces.')->group(function(){
    Route::get('/', 'CommerceController@index')->name('index');
    Route::get('/nuevo', 'CommerceController@create')->name('create');
    Route::delete('/delete/{id}','ComerceController@destroy')->name('destroy');      
});

//Empleados
Route::resource('employees', 'EmployeeController');
Route::prefix('/empleados')->name('employees.')->group(function(){
    Route::get('/{orden?}', 'EmployeeController@index')->name('index');
    Route::get('/nuevo', 'EmployeeController@create')->name('create'); 
    Route::delete('/delete/{id}','EmployeeController@destroy')->name('destroy');  
});


// Productos
Route::resource('products', 'ProductController');
Route::prefix('/productos')->name('products.')->group(function(){
    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/nuevo', 'ProductController@create')->name('create');
    Route::delete('/delete/{id}','ProductController@destroy')->name('destroy');      
});

// Ventas
Route::resource('sales', 'SaleController');
Route::prefix('/ventas')->name('sales.')->group(function(){
    Route::get('/', 'SaleController@index')->name('index');
    Route::get('/nueva', 'SaleController@create')->name('create');
    Route::delete('/delete/{id}','SaleController@destroy')->name('destroy');      
});
Route::resource('home', 'HomeController');
Route::get('/home', 'HomeController@index')->name('home');