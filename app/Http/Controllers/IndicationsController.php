<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use App\Http\Requests;

/**
 * Indications controller
 * @author Duy Dinh
 * @date 18/06/2016
 * 
 */
class IndicationsController extends Controller {

    public function showIndications() {
        return view('pages.indications')->with('active', 2);
    }

    public function showOsteoToutAge() {
        return view('pages.indications.tout-age')->with('active', 2);
    }

    public function showOsteoNourrissons() {
        return view('pages.indications.nourrissons')->with('active', 2);
    }

    public function showOsteoEnfants() {
        return view('pages.indications.enfants')->with('active', 2);
    }

    public function showOsteoFemmesEnceintes() {
        return view('pages.indications.femmes-enceintes')->with('active', 2);
    }

    public function showOsteoAdultes() {
        return view('pages.indications.adultes')->with('active', 2);
    }

    public function showOsteoSportifs() {
        return view('pages.indications.sportifs')->with('active', 2);
    }

    public function showOsteoSeniors() {
        return view('pages.indications.seniors')->with('active', 2);
    }

    public function showOsteoHandicap() {
        return view('pages.indications.handicap')->with('active', 2);
    }

    public function showOsteoArticulaire() {
        return view('pages.indications.osteo-articulaire')->with('active', 2);
    }
    
    public function showOsteoViscerale() {
        return view('pages.indications.osteo-viscerale')->with('active', 2);
    }
    
    public function showMalDeDos() {
        return view('pages.indications.mal-de-dos')->with('active', 2);
    }
    
    public function showColiques() {
        return view('pages.indications.coliques')->with('active', 2);
    }
    
    public function showEntorses() {
        return view('pages.indications.entorses')->with('active', 2);
    }
    
    public function showTravail() {
        return view('pages.indications.travail')->with('active', 2);
    }
    
    public function showSport() {
        return view('pages.indications.sport')->with('active', 2);
    }
    

}
