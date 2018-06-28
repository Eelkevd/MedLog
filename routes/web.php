<?php

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Route to homepage
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('homepage');
Route::get('/home/events', 'HomeController@events');

// verification of the email upon registration
// this also identifies the user as validated
Route::get('/verify/{verifyToken}', 'VerifyController@verify')->name('verify');
Route::get('/verify_invite', 'VerifyController@invite');

// Route to about us page
Route::get('/aboutus', 'AboutusController@aboutus');
Route::get('/about', 'AboutusController@aboutus');

// Route to about us page
Route::get('/privacy', 'AboutusController@privacystatement');
Route::post('/getPDF', 'AboutusController@getPDF');

// validated routers for users with a diary
Route::middleware('auth')->group(function () {
  // Routes to do show, search in or create event in calendar
  Route::get('/home/create_event', 'EventController@create');
  Route::post('/home/store_event', 'EventController@store');
  Route::get('/home/search', 'EventController@search');
  Route::get('/home/edit_event', 'EventController@edit');
  Route::get('/home/mycalendar', 'EventController@index');
  Route::get('/home/mycalendar/search', 'EventController@search');

  ////// DIARY ENTRY PAGE DIRECTION //////
  // Redirects to the create diary entry page
  Route::get('/entries', 'Entry\EntryController@create')->name('home');
  // Page to store diary entries
  Route::post('/entries/create_entry', 'Entry\EntryController@store');
  // Page to create and store user made illness
  Route::post('/entries/create_illness', 'Entry\IllnessController@store');
  // Page to create and store symptom
  Route::post('/entries/create_symptom', 'Entry\SymptomController@store');
  Route::get('/entries/{id}/show', 'Entry\EntryController@showentry')->name('entries.show');
  // Redirects to the edit diary entry page
  Route::get('/entries/{id}/edit', 'Entry\EditEntryController@editentry')->name('entries.edit');
  // Page to edit diary entries
  Route::post('/entries/{id}/edit_entry', 'Entry\EditEntryController@store_update');
  // Page to delete diary entry page
  Route::get('/entries/{id}/delete', 'Entry\EntryController@delete')->name('entries.delete');
  // Page to delete illness
  Route::post('/entries/delete_illness', 'Entry\IllnessController@delete');

  // Route to diary overview page
  Route::get('/overview', 'OverviewController@index');
  Route::get('/overview/search', 'OverviewController@search');
  Route::get('/overview/sortillness', 'OverviewController@sortillness');
  Route::get('/overview/sortintensity', 'OverviewController@sortintensity');
  Route::get('/overview/chronological', 'OverviewController@chronological');

  // Route to export page
  Route::get('/export', 'ExportController@index');
  Route::post('/export/period', 'ExportController@exportperiod');
  Route::post('/export/illness', 'ExportController@exportillness');
  Route::post('/export/getillnessPDF', 'ExportController@getillnessPDF');
  Route::post('/export/getdatePDF', 'ExportController@getperiodPDF');
  Route::post('/export/getPDF', 'ExportController@getPDF');


  // Route to medicine pages
  Route::get('/medicine', 'MedicineController@home');
  Route::get('/medicine/create_medicine', 'MedicineController@create');
  Route::post('/medicine/create_medicine', 'MedicineController@store');
  Route::post('/medicine/create_medicine_popup', 'MedicineController@popup');
  Route::get('/medicine/{id}/show', 'MedicineController@show')->name('medicine.show');
  Route::get('/medicine/{id}/delete', 'MedicineController@delete')->name('medicine.delete');
  Route::get('/medicine/{id}/edit', 'MedicineController@editmedicine')->name('medicine.edit');
  Route::post('/medicine/{id}/edit_medicine', 'MedicineController@store_update');

  // Routes for User-Reader communications
  // Route::get('/permissions', 'PermissionsController@index');
  // Route::get('/permissions/givepermission', 'PermissionsController@create');
  // Route::post('/permissions/givepermission', 'PermissionsController@store');
  // Route::delete('/permissions/delete/{id}', 'PermissionsController@delete');

  // Route to tool and pages
  Route::get('/tool', 'ToolController@home');
  Route::get('/tool/create_tool', 'ToolController@create');
  Route::post('/tool/create_tool', 'ToolController@store');
  Route::get('/tool/{id}/show', 'ToolController@show')->name('tool.show');
  Route::get('/tool{id}/delete', 'ToolController@delete')->name('tool.delete');
  Route::get('/tool{id}/edit', 'ToolController@edittool')->name('tool.edit');
  Route::post('/tool/{id}/edit_tool', 'ToolController@store_update');

});

// validated routers for readers middleware('can:read-diary')
Route::middleware('auth')->group(function () {
  // login page for readers
  Route::get('/reader/login', 'ReaderController@login')
  ->name('reader_login');
  // overview of the diaries to read for readers
  Route::get('/reader/index', 'ReaderController@index')
  ->name('reader_index');
  Route::get('/reader/show{client}', 'ReaderController@show')
  ->name('reader_index');
});

// routes voor all auth users
Route::middleware('auth')->group(function () {
  // Route to account page
  Route::get('/account', 'AccountController@index');
  Route::get('/account/edit', 'AccountController@edit');
  Route::post('/account/edit', 'AccountController@update');

  // Route to new themes
  Route::get('/account/thema', 'ThemeController@index');
  Route::get('account/theme_contrast', 'ThemeController@update_contrast');
  Route::get('account/theme_vrolijk', 'ThemeController@update_vrolijk');
  Route::get('account/theme_default', 'ThemeController@update');
});
