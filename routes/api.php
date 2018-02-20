<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

//Route::get('/download', 'ApiController@download');
// Customer API Routes
Route::get('get-available-days/{year}/{month}', 'Agenda\APIController@GetAvailableDays');
Route::get('get-available-days-current-month', 'Agenda\APIController@GetAvailableDaysCurrentMonth');

// Admin API Routes
Route::get('get-all-appointments', 'Agenda\AdminAPIController@GetAllAppointments');
Route::get('get-year-appointments/{year}', 'Agenda\AdminAPIController@GetYearAppointments');
Route::get('get-holidays/{year}', 'Agenda\AdminAPIController@GetYearHolidays');

Route::get('get-appointment-info', 'Agenda\AdminAPIController@GetAppointmentInfo');
Route::get('modify-appointment/{pid}', 'Agenda\AdminAPIController@ModifyAppointment');

Route::get('delete-appointment/{pid}', 'Agenda\AdminAPIController@DeleteAppointment');
Route::get('add-appointment', 'Agenda\AdminAPIController@AddAppointment');

Route::get('get-all-availability', 'Agenda\AdminAPIController@GetAllAvailability');
Route::any('set-availability', 'Agenda\AdminAPIController@SetAvailability');

Route::get('get-statistics', 'Agenda\AdminAPIController@GetStatistics');