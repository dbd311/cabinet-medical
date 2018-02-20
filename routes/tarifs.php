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

    Route::get('/tarifs-et-remboursements', 'TarifsController@showTarifs');


    // using .html extension
   
    Route::get('/tarifs-et-remboursements.html', 'TarifsController@showReimbursements');

    /** Pagination of tarifs et remboursements * */
    Route::get('/tarifs-et-remboursements/a', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/b', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/c', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/d', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/e', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/f', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/g', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/h', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/i', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/j', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/k', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/l', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/m', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/n', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/o', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/p', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/q', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/r', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/s', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/t', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/u', 'TarifsController@showReimbursements');
    Route::get('/tarifs-et-remboursements/v', 'TarifsController@showReimbursements');
//Route::get('/', 'TarifsController@');
//
});



