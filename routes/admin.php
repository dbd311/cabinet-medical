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


//    Route::controller('admin', 'Agenda\AdminController');

Route::group(['middleware' => 'osteo.admin'], function () {

//    Route::post('/login', 'Admin\LoginController@login');    
    Route::get('/logout', 'Admin\LoginController@logout');

    Route::get('/cpanel', 'Agenda\AdminController@index');

    Route::get('agenda', 'Agenda\BookingController@getIndex');
    Route::get('osteopaths', 'Admin\UsersController@index');


    Route::get('planning', 'Agenda\AdminController@planning');
    Route::post('generate-planning', 'Agenda\AdminAPIController@generatePlanning');
    //Route::post('add-holiday', 'Agenda\AdminAPIController@addHoliday');

    Route::get('booking/times', 'Agenda\BookingController@getTimes');
    Route::get('booking/details/{id}', 'Agenda\BookingController@getDetails');

    Route::post('appointment/confirm', 'Agenda\BookingController@anyConfirm');

    Route::post('appointment/add', 'Agenda\BookingController@add');
//    Route::get('appointment/add/{startdatetime}', 'Agenda\BookingController@add');

    Route::get('appointment/confirmed', 'Agenda\BookingController@anyConfirmed');

    Route::get('appointment/delete', 'Agenda\BookingController@delete');

    Route::get('admin', 'Agenda\AdminController@getIndex');
    Route::get('history', 'Agenda\AdminController@getConnexionHistory');


//    Route::get('/', 'Agenda\AdminController@index');
//
//
//    Route::any('login', 'Agenda\AdminController@login');
    // Appointment Routes
    Route::get('appointments', 'Agenda\AdminController@appointments');
    Route::get('schedule', 'Agenda\AdminController@schedule');
    Route::get('sms', 'Agenda\AdminController@sendSMS');
    Route::get('export-appointments','Agenda\AdminController@exportAppointments');
    
    // Availability Routes
    Route::get('availability', 'Agenda\AdminController@availability');
    
    Route::post('add/availability', 'Agenda\AdminController@addAvailability');

    
    
    
    // Configuration Routes
    Route::get('configuration', 'Agenda\AdminController@configuration');

    // Package Routes
    Route::get('packages', 'Agenda\AdminController@packages');
    Route::get('edit-package/{package_id}', 'Agenda\AdminController@editPackage');
    Route::post('update-package/{package_id}', array('as' => 'package.update'), 'Agenda\AdminController@updatePackage');
    //Route::get('admin/login', 'Agenda\AdminController@login');
    //
    //
    
    // API routes
    Route::group(['prefix' => 'api'], function() {
        // Customer API Routes
        Route::get('get-available-days', 'Agenda\APIController@GetAvailableDays');

        // Admin API Routes
        Route::get('get-all-appointments', 'Agenda\AdminAPIController@GetAllAppointments');

        Route::get('get-appointment-info/{id}', 'Agenda\AdminAPIController@GetAppointmentInfo');

        Route::get('modify-appointment/{pid}', 'Agenda\AdminAPIController@ModifyAppointment');
        Route::get('delete-appointment/{pid}', 'Agenda\AdminAPIController@DeleteAppointment');

        Route::get('get-all-availability', 'Agenda\AdminAPIController@GetAllAvailability');
        Route::any('set-availability', 'Agenda\AdminAPIController@SetAvailability');

    });
});
