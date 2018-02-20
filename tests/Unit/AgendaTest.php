<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use TestCase;
use App\Models\Appointment;

class AgendaTest extends TestCase {

    use WithoutMiddleware;
    use DatabaseTransactions;

    public function testDashboard() {
//        $this->withoutMiddleware();
        $this->visit('/admin/agenda')
                ->see('Mes rendez-vous')
                ->see('Tableau de bord');
    }

    /**
     * Get number of appointments.
     *
     * @return void
     */
    public function testAppointments() {
//        $this->withoutMiddleware();
// check number of appointments today
//        $this->assertTrue(true);
//        $this->visit('api/get-statistics')->see('"RDV":2');
    }

    /**
     * get available appointments
     */
    public function testGetAvailableAppointments() {
//        error_log('hi test');
//        $max = \App\User::max('id');
//        error_log($max);

        $agentID = 1;
        $duration = 45; // minutes
        $start = '08:00:00';
        $end = '20:00:00';

        $slots = Appointment::select('*')->where('package_id', '=', $agentID)->where('appointment_datetime', '>=', date('Y-m-d H:i:s'))->orderBy('appointment_datetime')->get();

//$availableSlot = $recentSlot;
        error_log($slots);
        $arrSlots = [];
        foreach ($slots as $slot) {
//            $dt = date_create($slot->appointment_datetime);
            array_push($arrSlots, $slot->appointment_datetime);
//            //error_log($slot->appointment_datetime);
//            error_log(date_format($dt, 'Y-m-d H:i:s'));
        }

        $it = new \ArrayIterator($arrSlots);
        printf('\n %d booked appointments ....%s', $it->count(), PHP_EOL);

        while ($it->valid()) {

            printf('--- %s%s', $it->current(), PHP_EOL);

            $dt = date_create($it->current());
// extract available slots of the current date
            $date = $dt->format('Y-m-d');

            $startSlotDate = $date . ' ' . $start;
            $endSlotDate = $date . ' ' . $end;

            if ($date === date('Y-m-d')) { // today
                $startSlotDate = $it->current();
            }

//            printf('available from %s to %s%s', $startSlotDate, $endSlotDate, PHP_EOL);

            date_add($dt, date_interval_create_from_date_string($duration . ' minutes'));


            // try to extract available slots

            $it->next();
            if ($it->valid() and ( $it->current() <= $endSlotDate)) {

                printf('+++ next available slot: %s%s', date_format($dt, 'Y-m-d H:i:s'), PHP_EOL);
//                $it->next();
            } else { // last slot of the day
                printf('+++ next available slot: %s%s', date_format($dt, 'Y-m-d H:i:s'), PHP_EOL);
            }
        }
    }

    public function testAddAppointment() {


        // get a random customer
        $customerID = \App\Models\Customer::random();

        // random an agent
        $agentID = \App\Models\Package::random();
        $duration = 45; // minutes
        $start = '08:00:00';
        $end = '20:00:00';

        // get next available appointment
        $slots = Appointment::select('*')->where('package_id', '=', $agentID)->where('appointment_datetime', '>=', date('Y-m-d H:i:s'))->orderBy('appointment_datetime')->take(10)->get();

        $arrSlots = [];
        foreach ($slots as $slot) {
//            $dt = date_create($slot->appointment_datetime);
            array_push($arrSlots, $slot->appointment_datetime);
//            //error_log($slot->appointment_datetime);
//            error_log(date_format($dt, 'Y-m-d H:i:s'));
        }

        $it = new \ArrayIterator($arrSlots);
        printf('\n %d booked appointments ....%s', $it->count(), PHP_EOL);

        if ($it->valid()) {

            printf('--- %s%s', $it->current(), PHP_EOL);

            $dt = date_create($it->current());
// extract available slots of the current date
            $date = $dt->format('Y-m-d');

            $startSlotDate = $date . ' ' . $start;
            $endSlotDate = $date . ' ' . $end;

            if ($date === date('Y-m-d')) { // today
                $startSlotDate = $it->current();
            }

//            printf('available from %s to %s%s', $startSlotDate, $endSlotDate, PHP_EOL);

            date_add($dt, date_interval_create_from_date_string($duration . ' minutes'));


            // try to extract available slots

            $it->next();
            if ($it->valid() and ( $it->current() <= $endSlotDate)) {

                printf('+++ next available slot: %s%s', date_format($dt, 'Y-m-d H:i:s'), PHP_EOL);
                $nextSlot = date_format($dt, 'Y-m-d H:i:s');
            } else { // last slot of the day
                printf('+++ next available slot: %s%s', date_format($dt, 'Y-m-d H:i:s'), PHP_EOL);
                $nextSlot = date_format($dt, 'Y-m-d H:i:s');
            }
        }

        error_log('agent id: ' . $agentID);
        error_log('customer id: ' . $customerID);
        error_log('next slot: ' . $nextSlot);


        $faker = \Faker\Factory::create();
        // add this slot to the agenda
        Appointment::create(array(
            'customer_id' => $customerID,
            'appointment_type' => array_rand(Appointment::getAppointmentTypes()),
            'package_id' => $agentID, // $info['package_id'],
            'motif' => $faker->text(30),
            'appointment_datetime' => $nextSlot
        ));

        // make sure that the inserted slot is stored in the appointment table
        $updatedSlots = Appointment::select('*')->where('package_id', '=', $agentID)->where('appointment_datetime', '>=', date('Y-m-d H:i:s'))->orderBy('appointment_datetime')->take(20)->get();

//$availableSlot = $recentSlot;

        $found = false;
        foreach ($updatedSlots as $slot) {

            if ($slot->appointment_datetime == $nextSlot) {
                error_log($nextSlot . ' found in database...');
                $found = true;
            }
        }

        $this->assertTrue($found);
    }

    public function testDeleteAppointment() {
        // random a booked appointment
//         $slots = Appointment::select('*')->where('appointment_datetime', '>=', date('Y-m-d H:i:s'))->orderBy('appointment_datetime')->take(10)->pluck('appointment_datetime', 'id');

        $slots = Appointment::select('*')->where('appointment_datetime', '>=', date('Y-m-d H:i:s'))->orderBy('appointment_datetime')->take(10)->pluck('id')->toArray();

        $slotID = array_rand($slots);

        error_log($slotID);

        // delete this appointment 
        Appointment::where('id', '=', $slotID)->delete();

        // make sure that the deleted appointment is not in the agenda
        $appointments = Appointment::select('*')->where('appointment_datetime', '>=', date('Y-m-d H:i:s'))->orderBy('appointment_datetime')->take(20)->pluck('id')->toArray();

        $found = false;
        foreach ($appointments as $id) {
            if ($id == $slotID) {
                $found = true;
                break;
            }
        }

        return $this->assertTrue($found == false);
    }

}
