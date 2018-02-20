<?php

use Illuminate\Database\Seeder;

use App\Models\BookingDateTime;

class BookingDateTimeTableSeeder extends Seeder {

    public function run() {

        Eloquent::unguard();

        $startTime = 7.50; // 8am
        $endTime = 20.45; // 8pm
        $interval = 45; // 45 minutes duration

        // today, i.e., the day we generate the agenda
        $currentDate = date('Y-m-d');

        $currentDateTime = strtotime($currentDate . ' + ' . $startTime . ' hours');

        $counter = 0;
        

        while ($counter < 31*1) { // for a period of one month
            // open slots for the new day
            $day = date('D', strtotime($currentDate));
//            echo '<b>Date: ' . $currentDate . ' (' . $day . ')</b><br /><br />';
            // close on Sunday
            if ($day == 'Sun') {
//                echo 'Closed <br /><br />';
            } else {

                $hours = $startTime;
                $minutes = $startTime * 60;
                
                do {

                    $currentDateTime = date('Y-m-d H:i', strtotime($currentDate . ' + ' . $minutes . ' minutes'));
//                    echo $currentDateTime . '<br /><br />';
                    BookingDateTime::create(array(
                        'booking_datetime' => date('Y-m-d H:i', strtotime($currentDateTime))
                    ));

                    // move to next slot
                    $minutes += $interval;
                    $hours = ($minutes / 60);
                } while ($hours <= $endTime);
            }
            // next day
            $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
            $counter++;
        }


//        BookingDateTime::create(array(
//            'booking_datetime' => date('Y-m-d H:i', strtotime($currentDate . ' + 5 days + 5 hours'))
//        ));
//
//        BookingDateTime::create(array(
//            'booking_datetime' => date('Y-m-d H:i', strtotime($currentDate . ' + 10 days + 16 hours'))
//        ));
//
//        // Set a whole week
//        //$nextWeek = strtotime($currentDate. ' + 11 days');
//        BookingDateTime::create(array(
//            'booking_datetime' => date('Y-m-d H:i', strtotime($currentDate . ' + 11 days + 8 hours'))
//        ));
//
//        // Set a whole week
//        BookingDateTime::create(array(
//            'booking_datetime' => date('Y-m-d H:i', strtotime($currentDate . ' + 11 days + 9 hours'))
//        ));
//
//        // Set a whole week
//        BookingDateTime::create(array(
//            'booking_datetime' => date('Y-m-d H:i', strtotime($currentDate . ' + 11 days + 10 hours'))
//        ));
//
//        // Set a whole week
//        BookingDateTime::create(array(
//            'booking_datetime' => date('Y-m-d H:i', strtotime($currentDate . ' + 11 days + 11 hours'))
//        ));
//
//        // Set a whole week
//        BookingDateTime::create(array(
//            'booking_datetime' => date('Y-m-d H:i', strtotime($currentDate . ' + 11 days + 12 hours'))
//        ));
//
//        // Set a whole week
//        BookingDateTime::create(array(
//            'booking_datetime' => date('Y-m-d H:i', strtotime($currentDate . ' + 11 days + 13 hours'))
//        ));
//
//        BookingDateTime::create(array(
//            'booking_datetime' => date('Y-m-d H:i', strtotime($currentDate . ' + 12 days + 8 hours'))
//        ));
    }

}
