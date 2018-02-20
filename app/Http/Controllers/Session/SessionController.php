<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;

class SessionController extends Controller {

    public static function updateAppointmentInfoSession(Request $request) {
        // reset appointment info
        if (Session::has('appointmentInfo')) {
            Session::forget('appointmentInfo');
        }
        $user = Auth::user();
        $appointmentInfo = [
            "package_id" => $user->has_package,
//            "package_name" => $package->package_name,
//            "package_time" => env('timeIntervals', 45),
            "fname" => ucfirst($request->get('fname')),
            "lname" => strtoupper($request->get('lname')),
            "number" => $request->get('number'),
            "email" => $request->get('email'),
            "motif" => $request->get('motif'),
            "appointment_type" => $request->get('appointmentType'),
            "datetime" => $request->get('startTime')
        ];

        Session::put('appointmentInfo', $appointmentInfo);
    }

    public static function deleteAppointmentInfoSession() {
        // reset appointment info
        if (Session::has('appointmentInfo')) {
            Session::forget('appointmentInfo');
        }
    }

}
