<?php

namespace App\Http\Controllers\Agenda;

use App\Http\Controllers\Controller;
use Input;
// Model Usage
use App\Models\Appointment;
use App\Models\Customer;
use App\Models\BookingDateTime;
use App\Models\Package;
use DB;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Holiday;
use Auth;
//use Log;

class AdminAPIController extends Controller {

    public function __construct() {
        // use osteo.admin middleware for storing and accessing session variables
        $this->middleware('osteo.admin');
    }

    /**
     * Retrieves all appointments in the current year and/or NEXT year for a particular agent and returns them
     * in fullCalendar expected JSON
     */
    public function GetYearAppointments($year) {
        //error_log(Auth::user()->name);        
        $appointments = Appointment::where(                        
                        DB::raw('extract(year from appointment_datetime)'), '>=', $year
                )->where('package_id', '=', Auth::user()->has_package)->get();

        $calendarAppointments = array();

        foreach ($appointments as $appointment) {
            $customer = Customer::find($appointment['customer_id']);


            $package = Package::find($appointment['package_id']);

            $eventStart = date_create($appointment['appointment_datetime']);
            $eventTime = date_create($appointment['appointment_datetime']);

            $time = (string) $package->package_time . ' minutes';
            $eventEnd = date_add($eventTime, date_interval_create_from_date_string($time));
            $event = array(
                'id' => $appointment['id'],
                'title' => Appointment::buildTitle($customer, $appointment),
                'start' => $eventStart->format('Y-m-d\TH:i:s'),
                'end' => $eventEnd->format('Y-m-d\TH:i:s'),
                'className' => Appointment::getBackgroundColor($appointment->appointment_type),
                'textColor' => Appointment::getTextColor($appointment->appointment_type)
            );
            array_push($calendarAppointments, $event);
        }

        return response()->json($calendarAppointments);
    }

    /**
     * Retrieves all public and private holidays in the current year
     * 
     */
    public function GetYearHolidays($year) {

        $holidays = Holiday::where(DB::raw('extract(year from date)'), '=', $year)->get();

        return response()->json($holidays);
    }

    /**
     * Retrieves all appointments and returns them
     * in fullCalendar expected JSON
     */
    public function GetAllAppointments() {

        $appointments = Appointment::all();
        $calendarAppointments = array();
        foreach ($appointments as $a) {

            $customer = Customer::find($a['customer_id']);
            $customer = $customer->first_name . ' ' . $customer->last_name;

            $package = Package::find($a['appointment_type']);

            $startDate = date_create($a['appointment_datetime']);
            $endDate = date_create($a['appointment_datetime']);
            $time = (string) $package->package_time . ' minutes';
            $endDate = date_add($endDate, date_interval_create_from_date_string($time));
            $event = array(
                'id' => $a['id'],
                'title' => $customer,
                'start' => $startDate->format('Y-m-d\TH:i:s'),
                'end' => $endDate->format('Y-m-d\TH:i:s'),
            );
            array_push($calendarAppointments, $event);
        }

        return response()->json($calendarAppointments);
    }

    /**
     * Get info of a particular appointment
     * @param type $id
     * @return type
     */
    public function GetAppointmentInfo(Request $request) {
//        $appointment = Appointment::with('customer')->find($id);
        $id = $request->get('eventID');
//        Log::info('getting appointment info for event ' . $id);
        $appointment = Appointment::leftJoin('customers', 'appointments.customer_id', '=', 'customers.id')->where('appointments.id', $id)->first();

        return response()->json($appointment);
    }

    /**
     * 
     * @param {integer} $pid appointment primary key Id
     * @return type
     */
    public function ModifyAppointment($pid) {
        return view('admin/modify-appointment')->with(array('pid' => $pid));
    }

    /**
     * Update customer information for the particular event (appointment)
     * @param Request $request
     */
    public function UpdateCustomer(Request $request) {
        $id = $request->get('eventID');

        $appointment = Appointment::find($id);

        if (!empty($appointment)) {
            $customerID = $appointment->customer_id;
            $firstName = ucfirst($request->get('fname'));
            $lastName = strtoupper($request->get('lname'));
            $phoneNumber = $request->get('number');
            $mail = $request->get('email');
            Customer::where('id', $customerID)->update(['first_name' => $firstName, 'last_name' => $lastName, 'contact_number' => $phoneNumber, 'email' => $mail]);

            // update appointment info
            $appointment->motif = $request->get('motif');
            $appointment->appointment_type = $request->get('appointmentType');

            $appointment->save();
        }
    }

    /**
     * 
     * @param {integer} $pid appointment primary key Id
     * @return type
     */
    public function DeleteAppointment($pid) {
        return view('admin/delete-appointment')->with(array('pid' => $pid));
    }

    public function GetAllAvailability() {
        $times = BookingDateTime::all();
        $availability = array();
        $configuration = TimeInterval::where('interval', env('timeInterval', '30'))->first();
        foreach ($times as $t) {
            $startDate = date_create($t['booking_datetime']);
            $endDate = date_create($t['booking_datetime']);

            // Get configuration variable
            // @todo default metric is minutes and only one supported
            // change to whichever metrics we support in the future
            $timeToAdd = $configuration->interval; //minutes
            $endDate = $endDate->add(new \DateInterval('PT' . $timeToAdd . 'M'));
            $event = [
                'id' => $t['id'],
                'title' => 'Available',
                'start' => $startDate->format('Y-m-d\TH:i:s'),
                'end' => $endDate->format('Y-m-d\TH:i:s'),
                'overlap' => false,
                'rendering' => 'background',
            ];
            array_push($availability, $event);
        }
        return response()->json($availability);
    }

    /**
     * Sets availability based on POST data
     * @param $start [Start datetime of selection]
     * @param $end   [End datetime of selection]
     *
     * @return  response()->json() - description of events
     */
    public function SetAvailability() {
        $post = Input::all();
        $configuration = TimeInterval::where('interval', env('timeInterval', '30'))->first();

        // Creating our datetime variables
        $startDate = new \DateTime($post['start']);
        $intervalDate = new \DateTime($post['start']);
        $endDate = new \DateTime($post['end']);

        // This loops from start to end, creating availability based on
        // configuration interval variables between start and end
        while ($intervalDate < $endDate) {
            $intervalDateEnd = new \DateTime($intervalDate->format('Y-m-d H:i:s'));
            $intervalDateEnd->add(new \DateInterval('PT' . $configuration->interval . 'M'));

            // We check to make sure we are not overlapping existing availability
            if (BookingDateTime::timeBetween($intervalDate, $intervalDateEnd)->first()) {
                return response()->json("Segment overlaps with existing availability", 500);
            } else {
                BookingDateTime::addAvailability($intervalDate);
                $intervalDate->add(new \DateInterval('PT' . $configuration->interval . 'M'));
            }
        }

        return response()->json('success', 200);
    }

    public function generatePlanning(Request $request) {
        echo $request->get('startdate');
        echo $request->get('enddate');
    }

    public function addHoliday(Request $request) {
        $start = $request->get('startdate');
        $end = $request->get('enddate');
        $note = $request->get('note');
        if (empty($note)) {
            $note = 'congé annuel';
        }
        $response['status'] = false;
        if (!empty($start)) {
            if (!empty($end)) {
                if ($start === $end) {
                    Holiday::add($start, $note);
                } else {
                    // range of days
                    $startDate = new DateTime($start);
                    $endDate = new DateTime($end);
                    while ($startDate <= $endDate) {
                        Holiday::add($startDate, $note);
                        date_add($startDate, date_interval_create_from_date_string('1 day'));
                    }
                }
            } else {
                Holiday::add($start, $note);
            }

            $response['status'] = true;
        }

        return response()->json($response);
    }

    public function GetStatistics() {

        // find all appointments where date is tomorrow
        $tomorrow = new DateTime('tomorrow');
        $nbSMS = Appointment::getAppointments($tomorrow->format("Y-m-d"))->count();

        // find all appointments where date is today

        $today = new DateTime();
        $nbRDV = Appointment::getAppointments($today->format("Y-m-d"))->count();

        $stats = ['SMS' => $nbSMS, 'RDV' => $nbRDV];
        return response()->json($stats);
    }

}
