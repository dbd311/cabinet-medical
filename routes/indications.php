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

    Route::get('/indications', 'IndicationsController@showIndications');
    Route::get('/indications/osteopathie-tout-age', 'IndicationsController@showOsteoToutAge');
    Route::get('/indications/osteopathie-et-seniors', 'IndicationsController@showOsteoSeniors');
    Route::get('/indications/osteopathie-et-nourrissons', 'IndicationsController@showOsteoNourrissons');
    Route::get('/indications/osteopathie-et-enfants', 'IndicationsController@showOsteoEnfants');
    Route::get('/indications/osteopathie-et-adultes', 'IndicationsController@showOsteoAdultes');
    Route::get('/indications/osteopathie-et-sportifs', 'IndicationsController@showOsteoSportifs');    
    Route::get('/indications/osteopathie-et-femmes-enceintes', 'IndicationsController@showOsteoFemmesEnceintes');
    Route::get('/indications/osteopathie-et-handicap', 'IndicationsController@showOsteoHandicap');

    Route::get('/indications/osteopathie-articulaire', 'IndicationsController@showOsteoArticulaire');
    Route::get('/indications/osteopathie-viscerale', 'IndicationsController@showOsteoViscerale');
    
    Route::get('/indications/mal-de-dos', 'IndicationsController@showMalDeDos');
    Route::get('/indications/coliques', 'IndicationsController@showColiques');
    Route::get('/indications/entorses', 'IndicationsController@showEntorses');
    Route::get('/indications/osteopathie-et-travail', 'IndicationsController@showTravail');
    Route::get('/indications/osteopathie-et-sport', 'IndicationsController@showSport');

    // using .html extension
    Route::get('/indications.html', 'IndicationsController@showIndications');
    Route::get('/indications/osteopathie-tout-age.html', 'IndicationsController@showOsteoToutAge');
    Route::get('/indications/osteopathie-et-seniors.html', 'IndicationsController@showOsteoSeniors');
    Route::get('/indications/osteopathie-et-nourrissons.html', 'IndicationsController@showOsteoNourrissons');
    Route::get('/indications/osteopathie-et-enfants.html', 'IndicationsController@showOsteoEnfants');
    Route::get('/indications/osteopathie-et-adultes.html', 'IndicationsController@showOsteoAdultes');
    Route::get('/indications/osteopathie-et-sportifs.html', 'IndicationsController@showOsteoSportifs');    
    Route::get('/indications/osteopathie-et-femmes-enceintes.html', 'IndicationsController@showOsteoFemmesEnceintes');
    Route::get('/indications/osteopathie-et-handicap.html', 'IndicationsController@showOsteoHandicap');

    Route::get('/indications/osteopathie-articulaire.html', 'IndicationsController@showOsteoArticulaire');
    Route::get('/indications/osteopathie-viscerale.html', 'IndicationsController@showOsteoViscerale');
    
    Route::get('/indications/mal-de-dos.html', 'IndicationsController@showMalDeDos');
    
    

});



