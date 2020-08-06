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
    \LogActivity::addToLog('User visited homepage');
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logActivity/{logs}', 'LogActivityController@logActivity')->name('logActivity.logs');
Route::get('/logs/{logs}', 'LogActivityController@show')->name('logs.show');
Route::get('/users', 'HomeController@ajax')->name('ajax');