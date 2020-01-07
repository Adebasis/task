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
    return view('auth.login');
});

Auth::routes();

Route::get('admin/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/admin/'], function () {

//Location Routes	

Route::get('locations','LocationController@index')->name('location.index');
Route::get("locations/create","LocationController@create")->name('location.create');
Route::post("locations","LocationController@store")->name('location.store');
Route::get("locations/{location}/edit","LocationController@edit")->name('location.edit');
Route::patch("locations/{location}","LocationController@update")->name('location.update');
Route::delete("locations/{location}","LocationController@destroy")->name('location.destroy');


//Customer Routes
Route::get('customers','CustomerController@index')->name('customer.index');
Route::get("customers/create","CustomerController@create")->name('customer.create');
Route::post("customers","CustomerController@store")->name('customer.store');
Route::get("customers/{customer}/edit","CustomerController@edit")->name('customer.edit');
Route::patch("customers/{customer}","CustomerController@update")->name('customer.update');
Route::delete("customers/{customer}","CustomerController@destroy")->name('customer.destroy');


});
