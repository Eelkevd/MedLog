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

// Route::get('/', function () {
//     return view('welcome');
// });


////// DIARY ENTRY PAGE DIRECTION //////

// Redirects to the create diary entry page
Route::get('/entry', 'Entry\EntryController@home');
// Page to store diary entry
Route::post('/entry/create_entry', 'Entry\EntryController@store');
// Page to create and store user made illness
Route::get('/entry/create_illness', 'Entry\IllnessController@create');
Route::post('/entry/create_illness', 'Entry\IllnessController@store');
// Page to create and store symptom
Route::post('/entry/create_symptom', 'Entry\SymptomController@store');