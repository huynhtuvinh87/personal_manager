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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Post', 'prefix' => 'post'], function () {
    Route::get('/', 'PostController@index')->name('post.index');
    Route::get('create', 'PostController@create')->name('post.create');
    Route::post('store', 'PostController@store')->name('post.store');
    Route::get('edit/{id}', 'PostController@edit')->name('post.edit');
    Route::put('update/{id}', 'PostController@update')->name('post.update');
    Route::delete('delete/{id}', 'PostController@destroy')->name('post.delete');
});

Route::group(['namespace' => 'CollectMoney', 'prefix' => 'collect-money'], function () {
    Route::get('/', 'CollectMoneyController@index')->name('collect_money.index');
    Route::get('create', 'CollectMoneyController@create')->name('collect_money.create');
    Route::post('store', 'CollectMoneyController@store')->name('collect_money.store');
    Route::get('edit/{id}', 'CollectMoneyController@edit')->name('collect_money.edit');
    Route::put('update/{id}', 'CollectMoneyController@update')->name('collect_money.update');
    Route::delete('delete/{id}', 'CollectMoneyController@destroy')->name('collect_money.delete');
});

Route::group(['namespace' => 'SpendingMoney', 'prefix' => 'spending-money'], function () {
    Route::get('/', 'SpendingMoneyController@index')->name('spending_money.index');
    Route::get('create', 'SpendingMoneyController@create')->name('spending_money.create');
    Route::post('store', 'SpendingMoneyController@store')->name('spending_money.store');
    Route::get('edit/{id}', 'SpendingMoneyController@edit')->name('spending_money.edit');
    Route::put('update/{id}', 'SpendingMoneyController@update')->name('spending_money.update');
    Route::delete('delete/{id}', 'SpendingMoneyController@destroy')->name('spending_money.delete');
});
