<?php

namespace App\Http\Controllers\Agenda;

use App\Http\Controllers\Controller;
use DateTime;
use App\Models\Customer;
use App\Models\Appointment;
use Illuminate\Http\Request;

// Declare Models to be used

class MessageController extends Controller {

    /**
     * Send an email reporting information about a deleted appointment
     * @param object $appointment
     */
    public static function sendDeletionInfo($appointment) {
        if (env('SEND_MAIL') === true) {
            $sender = env('SECRETARIAT_EMAIL', 'dinh.osteopathe@gmail.com');
            $receiver = env('SECRETARIAT_EMAIL', 'dinh.osteopathe@gmail.com');

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            $headers .= "From: Cabinet d'ostéopathie à Thionville <" . $sender . ">";

            setlocale(LC_TIME, 'fr_FR.utf8', 'fra');

            $datetime = new DateTime($appointment->appointment_datetime);

            //$slot = $datetime->format('D dd/MM/YYYY [à] HH:mm');
            $slot = strftime("%A %d/%m/%Y à %H:%M", $datetime->getTimestamp());
            $subject = 'Annulation pour le ' . $slot;

            // find customer information
            $customer = Customer::find($appointment->customer_id);

            $message = '<!DOCTYPE html><html><head><meta charset="UTF-8" /></head><body> ';
            $message .= 'Bonjour, <br><br>
                Le rendez-vous du <b>' . $slot . '</b>
                    pour le patient <br><br>' . sprintf("<b>%s %s</b>", $customer->last_name, $customer->first_name);

            if (!empty($appointment->appointment_type)) {
                $message .= '<br> (' . Appointment::getAppointmentType($appointment->appointment_type) . ')';
            }

            if (!empty($customer->email)) {
                $message .= '<br> Email : ' . $customer->email;
            }

            if (!empty($customer->contact_number)) {
                $message .= '<br> Tél : ' . $customer->contact_number;
            }

            $message .= '<br><br>a été annulé. <br><br>';
            $message .= '</body></html>';

            mail($receiver, $subject, $message, $headers);
        }
    }

    public function generateSMS() {
        // find all appointments where date is tomorrow
        $date = new DateTime('tomorrow');
        $appointments = Appointment::getAppointments($date->format("Y-m-d"));

        $messages = [];
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');

        foreach ($appointments as $appointment) {

            $datetime = new DateTime($appointment->appointment_datetime);
            $slot = strftime("<b>%a %d/%m/%Y</b> à <b>%H:%M</b>", $datetime->getTimestamp());
            $customer = Customer::find($appointment->customer_id);

            if ($customer->contact_number) {
                $message = sprintf('*** %s %s ==> <b>%s</b> <br><br>Bonjour, votre prochain rendez-vous est le %s au cabinet d\'ostéopathie sis au 18 rue Mangin à Thionville. Merci et à bientôt. <br><br>', $customer->last_name, $customer->first_name, $customer->contact_number, $slot);
                array_push($messages, $message);
            }
        }

        if (sizeof($messages) == 0) {

            $datetime = new DateTime();
            $slot = strftime("<b>%a %d/%m/%Y</b> à <b>%H:%M</b>", $datetime->getTimestamp());

            $message = 'Aucun SMS à envoyer aux patients pour demain. <br><br>Voici un exemple de message SMS : <br><br>';
            $message .= sprintf('*** %s %s ==> <b>%s</b> <br><br>Bonjour, votre prochain rendez-vous est le %s au cabinet d\'ostéopathie sis au 18 rue Mangin à Thionville. Merci et à bientôt. <br><br>', "NOM", "Prénom", "0123456789", $slot);
            array_push($messages, $message);
        }

        return response()->json($messages);
    }

    /**
     * Parse request using fields in formAdd in appointment.js
     * @param Request $request
     * @return type
     */
    public function sendConfirmationEmail(Request $request) {

        if (env('SEND_MAIL') === true) {
            $sender = env('SECRETARIAT_EMAIL', 'dinh.osteopathe@gmail.com');
            $receiver = $request->get('email');

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            $headers .= "From: Cabinet d'ostéopathie à Thionville <" . $sender . ">";

            setlocale(LC_TIME, 'fr_FR.utf8', 'fra');

            $startTime = $request->get('startTime');

            // try to format time if it uses UTC format ISO 8601
            if (strpos($startTime, ' ') === false) {
                $datetime = new DateTime($startTime);
                $appointmentTime = strftime("%A %d/%m/%Y à %H:%M", $datetime->getTimestamp());
            } else {
                $appointmentTime = $startTime;
            }
            $subject = 'Confirmation pour le rendez-vous du ' . $appointmentTime;

            // find customer information
            $lastName = $request->get('lname');
            $firstName = $request->get('fname');

            $message = '<!DOCTYPE html><html><head><meta charset="UTF-8" /></head><body> ';
            $message .= 'Bonjour ' . sprintf("<b>%s %s</b>", ucfirst($firstName), strtoupper($lastName)) . ',<br><br>' .
                    'Le cabinet d\'ostéopathie de Mme Carole DINH vous confirme le rendez-vous du <b>' . $appointmentTime . '</b><br><br>
                    au 18 rue du Général Mangin à Thionville (Moselle)<br><br>';
            $message .= '<p>Lors de votre consultation, veuillez apporter tous les examens complémentaires dont vous disposez (examens biologiques, imageries médicales, comptes rendus opératoires, etc.).</p><br>';
            $message .= '<p>Cordialement,</p> <p>Cabinet d\'ostéopathie<br>18 rue du Général Mangin, Thionville</p><br>Tél : ' . env('PHONE_DOT', '06.51.87.56.62') . '<br>Site Web: ' . env('SITE_URL', 'http://www.osteo-thionville.fr');

            $message .= '</body></html>';

            mail($receiver, $subject, $message, $headers);

            return response()->json(['status' => 'success', 'message' => $message]);
        }

        return response()->json(false);
    }

    /**
     * Parse request using fields in formUpdate in appointment.js
     * @param Request $request
     * @return type
     */
    public function sendDeleteEmail(Request $request) {


        if (env('SEND_MAIL') === true) {
            $sender = env('SECRETARIAT_EMAIL', 'dinh.osteopathe@gmail.com');
            $receiver = $request->get('email');
            $appointmentTime = $request->get('startTime');

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            $headers .= "From: Cabinet d'ostéopathie à Thionville <" . $sender . ">";

            $subject = 'Annulation du rendez-vous du ' . $appointmentTime;
            // find customer information
            $lastName = $request->get('lname');
            $firstName = $request->get('fname');

            $message = '<!DOCTYPE html><html><head><meta charset="UTF-8" /></head><body> ';
            $message .= 'Bonjour ' . sprintf("<b>%s %s</b>", ucfirst($firstName), strtoupper($lastName)) . ',<br><br>' .
                    'Le cabinet d\'ostéopathie de Mme Carole DINH vous confirme l\'annulation du rendez-vous du <b>' . $appointmentTime . '</b><br><br>
                    au 18 rue du Général Mangin à Thionville (Moselle)<br><br>';
            $message .= '<p>Pour prendre un nouveau rendez-vous, veuillez appeler le cabinet au ' . env('PHONE_DOT') . '</p>';
            $message .= '<p>A noter qu\'il est possible de prendre un rendez-vous sur Internet en indiquant vos préférences horaires <a href="' . env('SITE_URL') . '/rendez-vous">ici</a></p>';
            $message .= '<p>Cordialement,</p> <p>Cabinet d\'ostéopathie<br>18 rue du Général Mangin, Thionville</p><br>Tél : ' . env('PHONE_DOT') . '<br>Site Web: ' . env('SITE_URL');

            $message .= '</body></html>';

            mail($receiver, $subject, $message, $headers);

            return response()->json(['status' => 'success', 'message' => $message]);
        }

        return response()->json(false);
    }

}
