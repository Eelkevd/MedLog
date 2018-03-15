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
Route::get('/entries', 'Entry\EntryController@create');
// Page to store diary entries
Route::post('/entries/create_entry', 'Entry\EntryController@store');
// Page to create and store user made illness
Route::post('/entries/create_illness', 'Entry\IllnessController@store');
// Page to create and store symptomes
Route::post('/entries/create_symptom', 'Entry\SymptomController@store');