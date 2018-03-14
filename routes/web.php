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

// Route to landing page
Route::get('/', function () {
    return view('welcome');
});

// Routes for login system
Auth::routes();

// Route to homepage
Route::get('/home', 'HomeController@index')->name('home');
