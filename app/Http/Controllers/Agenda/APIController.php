<?php

namespace App\Http\Controllers\Agenda;

use App\Http\Controllers\Controller;
// Model Usage
use App\Models\BookingDateTime;
use DB;

class APIController extends Controller {

    // Get available days
    function GetAvailableDays($year, $month) {

        $availableDays = BookingDateTime::where(DB::raw('extract(month from booking_datetime)'), $month)->where(DB::raw('extract(year from booking_datetime)'), $year)->get();

        return response()->json($availableDays);
    }

    // Get available days with a month of a specific year
    function GetAvailableDaysCurrentMonth() {
        $month = date('n');
        $year = date('Y');

        $availableDays = BookingDateTime::where(DB::raw('extract(month from booking_datetime)'), $month)->where(DB::raw('extract(year from booking_datetime)'), $year)->get();

        return response()->json($availableDays);
    }

}
