<?php

namespace App\Http\Controllers\Agenda;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Package;
use App\Models\Customer;
use App\Models\Configuration;
use App\Models\TimeInterval;
use Illuminate\Support\Facades\Input;
use Auth;
use View;
use Illuminate\Http\Request;

class AdminController extends Controller {

    /**
     * Function to retrieve the index page
     */
    public function index() {
        $errors = "None";
        return view('admin/login')->with('errors', $errors);
    }

    /**
     * Function to attempt authorization, and redirect to admin page if successful, redirect to login with errors if not
     */
    public function login() {
        $input = Input::all();
        if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            return $this->appointments();
        } else {
            //$errors = "Invalid username or password";
            $errors = "Identifiant et/ou mot de passe invalide";
            return view('admin/login')->with('errors', $errors);
        }
    }

    public function appointments(Request $request) {
        if (Auth::check()) {
            return view('admin/appointments', ['viewMode' => $request->get('viewMode')]);
        } else {
            return $this->login();
        }
    }

    public function availability() {
        return view('admin/availability');
    }

    public function sendSMS() {
        return view('admin/sms/main');
    }

    /**
     * Plan for public/private holidays
     * @param Request $request
     * @return type
     */
    public function schedule() {
        if (Auth::check()) {
            return view('admin/planning');
        } else {
            return $this->login();
        }
    }

    public function exportAppointments() {

        return view('admin/exported-agenda')->with('appointments', Appointment::getBookedAppointments());
    }

    public function configuration() {

        $configuration = TimeInterval::where('interval', env('timeInterval', '30'))->first();

        return view('admin/configuration', ['configuration' => $configuration]);
    }

    public function planning() {
        return view('admin/planning');
    }
    
    public function getConnexionHistory() {
        return view('admin/connexion-history');
    }

    /**
     * View function for list of packages
     * @return view 
     */
    public function packages() {
        $packages = Package::all();
        return view('admin/packages/index', ['packages' => $packages]);
    }

    /**
     * View Function to edit package information
     * @param  int $package_id
     * @return view
     */
    public function editPackage($package_id) {
        return view('admin/packages/editPackage', ['package' => Package::find($package_id)]);
    }

    public function updatePackage($package_id) {
        dd('tets');
    }

    public function anySetTime() {
        dd('test');
    }

}
