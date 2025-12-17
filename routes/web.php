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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', "AuthController@login")->name('login');
    Route::post('/ceklogin',"AuthController@cekLogin");
    Route::get('/', "VisitorController@searchdata");
    Route::get('actsearchdata', "VisitorController@actsearchdata");
});



Route::group(['middleware' => 'auth'], function () {

    Route::get('/addform','PageController@addform');
    Route::post('/saveform','PageController@saveform');
    Route::get('/deleteform/{id}', "PageController@formdelete");
    Route::put('/update/{id}', "PageController@formupdate");
    Route::get('/editform/{id}', "PageController@editform");
    
    Route::get('/users', "PageController@users");
    Route::get('/users/addform', "PageController@usersaddform");
    Route::post('/users/save', "PageController@userssave");
    Route::get('/users/deleteform/{id}', "PageController@usersdelete");
    
    Route::get('/home','PageController@home');
    Route::get('/logout', "AuthController@logout");
    Route::get('/setting', "PageController@setting");
    Route::put('/updatepass', "PageController@updatepass");
});