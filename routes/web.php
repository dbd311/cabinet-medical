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

Route::group(['middleware' => 'osteo.base'], function () {


    Route::get('/', 'ResourceController@showHomepage');

    Route::get('/accueil', array('as' => 'accueil', 'uses' => 'ResourceController@showHomepage'));
    Route::get('/index', array('as' => 'accueil', 'uses' => 'ResourceController@showHomepage'));
    Route::get('/home', array('as' => 'home', 'uses' => 'ResourceController@showHomepage'));

    Route::get('/votre-osteopathe', array('as' => 'votre-osteopathe', 'uses' => 'ResourceController@showVotreOsteopathe'));

    Route::get('/osteopathie', 'ResourceController@showOsteopathie');
//    Route::get('/indications', 'ResourceController@showIndications'); ==> check indications.php
    Route::get('/consultation', 'ResourceController@showConsultation');
//    Route::get('/tarifs-et-remboursements', 'ResourceController@showTarifs'); ==> check tarifs.php

    Route::get('/questions-frequentes', 'ResourceController@showFAQs');

    Route::get('/le-cabinet', 'ResourceController@showCabinet');

    Route::get('/divers', 'ResourceController@showDivers');
    Route::get('/actualites', 'ResourceController@showActualites');
    Route::get('/feeds', 'ResourceController@showFeeds');

    Route::get('/rendez-vous', 'ResourceController@showRendezVous');
    Route::post('/rendez-vous', 'ResourceController@bookRendezVousByEmail');

    Route::get('/sitemap', 'ResourceController@showSiteMap');
    Route::get('/mentions-legales', 'ResourceController@showMentionsLegales');


    // using .html extension
    Route::get('/accueil.html', array('as' => 'accueil', 'uses' => 'ResourceController@showHomepage'));
    Route::get('/index.html', array('as' => 'accueil', 'uses' => 'ResourceController@showHomepage'));
    Route::get('/home.html', array('as' => 'home', 'uses' => 'ResourceController@showHomepage'));

    Route::get('/votre-osteopathe.html', array('as' => 'votre-osteopathe', 'uses' => 'ResourceController@showVotreOsteopathe'));

    Route::get('/osteopathie.html', 'ResourceController@showOsteopathie');
//    Route::get('/indications.html', 'ResourceController@showIndications'); ==> check indications.php
    Route::get('/consultation.html', 'ResourceController@showConsultation');
//    Route::get('/tarifs-et-remboursements.html', 'ResourceController@showTarifs'); ==> check tarifs.php

    Route::get('/questions-frequentes.html', 'ResourceController@showFAQs');

    Route::get('/le-cabinet.html', 'ResourceController@showCabinet');

    Route::get('/divers.html', 'ResourceController@showDivers');
    Route::get('/actualites.html', 'ResourceController@showActualites');
    Route::get('/feeds.html', 'ResourceController@showFeeds');
    Route::get('/rendez-vous.html', 'ResourceController@showRendezVous');
    Route::get('/sitemap.html', 'ResourceController@showSiteMap');
    Route::get('/mentions-legales.html', 'ResourceController@showMentionsLegales');

    Route::get('/load-reimbursements/{suffix}', 'TarifsController@loadReimbursements');

    Route::get('/termes-a', 'ResourceController@showTermesA');
    Route::get('/termes-b', 'ResourceController@showTermesB');
    Route::get('/termes-s', 'ResourceController@showTermesS');

    Route::get('/generate-sitemap', 'AdminController@generateSiteMap');




    // User auth
    Auth::routes();
    Route::get('/logout', 'Auth\LoginController@logout');

    // Admin auth
    Route::get('/admin/login', 'Admin\LoginController@showLoginForm');
    Route::post('/admin/login', 'Admin\LoginController@login');
//    Route::get('/cpanel', 'Agenda\AdminController@index');
//    Route::get('/admin/logout', 'Admin\LoginController@logout');
    // Agenda routes
    Route::get('/booking/times', 'Agenda\BookingController@getTimes');
    Route::get('/booking/details/{id}', 'Agenda\BookingController@getDetails');

    Route::get('/appointment/add', 'Agenda\BookingController@add');

    // AJAX requests
    Route::post('/api/add-appointment', [
        'uses' => 'Agenda\BookingController@AddAppointment',
        'middleware' => 'osteo.admin'
    ]);

    Route::delete('/api/delete-appointment', [
        'uses' => 'Agenda\BookingController@DeleteAppointment',
        'middleware' => 'osteo.admin'
    ]);

    Route::post('/api/update-appointment', [
        'uses' => 'Agenda\BookingController@UpdateAppointment',
        'middleware' => 'osteo.admin'
    ]);   
    
    Route::post('/api/add-holiday', [
        'uses' => 'Agenda\AdminAPIController@addHoliday',
        'middleware' => 'osteo.admin'
    ]);

    Route::put('/api/update-customer-info', [
        'uses' => 'Agenda\AdminAPIController@UpdateCustomer',
        'middleware' => 'osteo.admin'
    ]);

    Route::get('/api/generate-sms', [
        'uses' => 'Agenda\MessageController@generateSMS',
        'middleware' => 'osteo.admin'
    ]);
    
    Route::get('/api/confirm-appointment-by-email', [
        'uses' => 'Agenda\MessageController@sendConfirmationEmail',
        'middleware' => 'osteo.admin'
    ]);
    
    Route::get('/api/cancel-appointment-by-email', [
        'uses' => 'Agenda\MessageController@sendDeleteEmail',
        'middleware' => 'osteo.admin'
    ]);
    
});




