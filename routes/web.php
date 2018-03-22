<?php

Route::middleware('validate')->group(function () {
  //validated routers
});

// Route to homepage
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/home/events', 'HomeController@events');

// Routes to do show, search in or create event in calendar
Route::get('/home/create_event', 'EventController@create');
Route::post('/home/store_event', 'EventController@store');
Route::get('/home/search', 'EventController@search');
Route::get('/home/edit_event', 'EventController@edit');
Route::get('/home/mycalendar', 'EventController@index');

// Routes for login system
Auth::routes();

// verification of the email upon registration
Route::get('/verify/{verifyToken}', 'VerifyController@verify')->name('verify');

////// DIARY ENTRY PAGE DIRECTION //////

// Redirects to the create diary entry page
Route::get('/entries', 'Entry\EntryController@create')->name('home');
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

// Route to new themes
Route::get('account/theme_contrast', 'ThemeController@update_contrast');
Route::get('account/theme_vrolijk', 'ThemeController@update_vrolijk');
Route::get('account/theme_default', 'ThemeController@update');

// Route to about us page
Route::get('/aboutus', 'AboutusController@aboutus');
Route::get('/about', 'AboutusController@aboutus');
