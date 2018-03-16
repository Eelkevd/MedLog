<?php

// Route to homepage
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');


// Routes for login system
Auth::routes();


////// DIARY ENTRY PAGE DIRECTION //////

// Redirects to the create diary entry page
Route::get('/entries', 'Entry\EntryController@create');
// Page to store diary entries
Route::post('/entries/create_entry', 'Entry\EntryController@store');
// Page to create and store user made illness
Route::post('/entries/create_illness', 'Entry\IllnessController@store');

// Page to create and store symptom
Route::post('/entries/create_symptom', 'Entry\SymptomController@store');


// Route to account page
Route::get('/account', 'AccountController@index');
Route::get('/account/edit', 'AccountController@edit');
Route::post('/account/edit', 'AccountController@update');

// Route to about us page
Route::get('/aboutus', 'AboutusController@aboutus');