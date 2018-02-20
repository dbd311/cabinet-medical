<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Session;
use DB;
use Auth;

class Appointment extends Model implements AuthenticatableContract {

    use authenticatable;

    protected $table = 'appointments';
    protected $fillable = array('customer_id', 'appointment_type', 'appointment_datetime', 'motif', 'package_id');
    protected $guarded = array('id', 'created_at', 'updated_at');

    /**
     * Customer relation 
     * Appointment has one customer
     */
    public function customer() {
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
    }

    public static function addAppointment($customerID) {
        $info = Session::get('appointmentInfo');
        $agent = Auth::user();
//        error_log('adding appointment in agenda: ' . $agent->has_package);
        Appointment::create(array(
            'customer_id' => $customerID,
            'appointment_type' => $info['appointment_type'],
            'package_id' => $agent->has_package, // $info['package_id'],
            'motif' => $info['motif'],
            'appointment_datetime' => $info['datetime']
        ));
        return response()->json(['customerID' => $customerID]);
    }

    public static function updateAppointment($id, $start) {

        $appointment = Appointment::find($id);

        $prev_datetime = $appointment->appointment_datetime;

        $appointment->appointment_datetime = $start;

        $appointment->save();

        return response()->json(['previous_datetime' => $prev_datetime]);
    }

    public function scopeTimeBetween($query, $begin, $end) {
//return $query->whereBetween('appointment_datetime', array($begin, $end));
        return $query->where('appointment_datetime', '>', $begin)->where('appointment_datetime', '<', $end);
    }
    
    public static function  getAppointmentTypes(){
        return Appointment::all()->pluck('appointment_type')->toArray();
    }

    public static function getBackgroundColor($type) {
        $className = '';

        switch ($type) {
            case 1:
                $className = 'jamais-venu';
                break;
            case 2:
                $className = 'suivi';
                break;
            case 3:
                $className = 'deja-venu';
                break;
            default:
                break;
        }
        return $className;
    }

    public static function getTextColor($type) {
        $color = '';

        switch ($type) {
            case 1:
                $color = 'white';
                break;
            case 2:
                $color = 'green';
                break;
            case 3:
                $color = 'white';
                break;
            default:
                break;
        }
        return $color;
    }

    public static function buildTitle($customer, $appointment) {
        $title = $customer->first_name . ' ' . $customer->last_name;
        if (!empty($appointment->motif)) {
            $title = $title . ' (' . $appointment->motif . ')';
        }
        return $title;
    }

    /**
     * Get all appointments for a given date
     * @param type $date
     */
    public static function getAppointments($date) {
        return Appointment::select('*')->where(DB::raw("date(appointment_datetime)"), $date)->orderBy('appointment_datetime')->get();
    }

    /*     * *
     * Booked appointements within two weeks
     */

    public static function getBookedAppointments() {
// today
        $startDate = date('d/m/Y');
        $nextWeek = time() + (2 * 7 * 24 * 3600);

        $endDate = date('d/m/Y', $nextWeek);

        return Appointment::select('*')->where(DB::raw("date(appointment_datetime)"), ">=", $startDate)->where(DB::raw("date(appointment_datetime)"), "<=", $endDate)->orderBy('appointment_datetime')->get();
    }

    /*     * *
     * Convert integer to readable appointment type
     */

    public static function getAppointmentType($type) {

        switch ($type) {
            case 1:
                $case = 'jamais venu';
                break;
            case 2:
                $case = 'suivi';
                break;
            case 3:
                $case = 'déjà venu';
                break;
            default:
                $case = $type;
                break;
        }

        return $case;
    }

    /**
     * get next available appointment
     */
    public function getNextAvailableAppointment() {
        // find the most recent event in the calenar for the authenticated agent
        $agent = Auth::user();

        $nextSlot = \App\Models\Appointment::select('*')->where('package_id', '=', $agent->has_package)->where('appointment_datetime', '>=', date('Y-m-d H:i:s'))->orderBy('appointment_datetime')->first();


        return $nextSlot;
    }

    public function getAuthIdentifier() {
        
    }

    public function getAuthIdentifierName() {
        
    }

    public function getAuthPassword() {
        
    }

    public function getRememberToken() {
        
    }

    public function getRememberTokenName() {
        
    }

    public function setRememberToken($value) {
        
    }

}
