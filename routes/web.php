<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/', 'LiveController@index')->name('live');

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'user'], function(){
    Route::group(['prefix' => 'my-school'], function(){
        Route::get('/', 'SchoolController@index');
        Route::get('create', 'SchoolController@create');
        Route::post('create', 'SchoolController@store');
        Route::get('{school_code}', 'SchoolController@view')->name('schoolview');
    });
});
Route::get('dashboard', 'HomeController@index')->name('home');
Route::get('setup', 'HomeFrontController@setup')->name('setup');
Route::post('setup', 'HomeFrontController@storesetup')->name('setup');
Route::get('profile', 'HomeFrontController@profile')->name('profile');