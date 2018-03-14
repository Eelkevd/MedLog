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


////// DIARY ENTRY PAGE DIRECTION //////

// Redirects to the create diary entry page
// Route::get('/entries/create_entry', 'Entry\EntryController@home');
Route::get('/entries/create_entry', 'Entry\EntryController@create');
// Page to create and store user made illness
// Route::get('/entries/create_illness', 'Entry\IllnessController@create');
Route::post('/entries/create_illness', 'Entry\IllnessController@store');
// Page to create and store symptom
// Route::get('/entries/create_symptom', 'Entry\SymptomController@create');
Route::post('/entries/create_symptom', 'Entry\SymptomController@store');

// Routes for login system
Auth::routes();

// Route to homepage
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

