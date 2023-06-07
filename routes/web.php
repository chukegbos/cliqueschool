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
        
        Route::get('status/{id}', 'SchoolController@status');
        Route::get('delete/{id}', 'SchoolController@destroy');
        Route::get('{school_code}', 'SchoolController@view')->name('schoolview');
      
        Route::group(['prefix' => 'lecture'], function(){
            Route::post('', 'LectureController@store')->name('storeLecture');
            Route::put('{id}', 'LectureController@store')->name('updateLecture');
            Route::get('create/{school_code}', 'LectureController@create')->name('createLecturePage');
            Route::get('{lecture_code}', 'LectureController@view')->name('lectureview');
        });

        Route::group(['prefix' => 'assignment'], function(){
            Route::post('create', 'AssignmentController@store');
        });
        
    });
});

Route::group(['prefix' => 'category'], function(){
    Route::get('/', 'CategoryController@index');
});

Route::get('dashboard', 'HomeController@index')->name('home');
Route::get('setup', 'HomeFrontController@setup')->name('setup');
Route::post('setup', 'HomeFrontController@storesetup')->name('setup');
Route::get('profile', 'HomeFrontController@profile')->name('profile');