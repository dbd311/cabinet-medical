<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;

/**
 * Resource controller
 * @author Duy Dinh
 * @date 18/06/2016
 * 
 */
class ResourceController extends Controller {

    public function showHomePage() {
        return view('welcome')->with('active', 0);
    }

    public function showOsteopathie() {
        return view('pages.osteopathie')->with('active', 1);
    }

//    public function showIndications() {
//        return view('pages.indications')->with('active', 2);
//    } ==> check IndicationsController   



    public function showConsultation() {
        return view('pages.consultation')->with('active', 3);
    }

    public function showFAQs() {
        return view('pages.FAQs')->with('active', 4);
    }

//    public function showTarifs() {
//        return view('pages.tarifs')->with('active', 5);
//    } ==> check TarifsController    

    public function showCabinet() {
        return view('pages.cabinet')->with('active', 6);
    }

    public function showDivers() {
        return view('pages.divers')->with('active', 7);
    }

    public function showActualites() {
        return view('pages.actualites')->with('active', 8);
    }

    public function showRendezVous() {
        return view('pages.rendez-vous')->with('active', 9);
    }

    public function showFeeds() {
        return view('pages.feeds');
    }

    public function showSiteMap() {
        return view('pages.sitemap');
    }

    public function showMentionsLegales() {
        return view('pages.mentions-legales');
    }

    public function showVotreOsteopathe() {
        return view('pages.votre-osteopathe');
    }

    public function showTermesA() {
        return view('pages.terms.a')->with('active', 1);
    }

    public function showTermesS() {
        return view('pages.terms.s')->with('active', 1);
    }

    function extractDays(Request $request) {
        $res = '';
        $days = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
        error_log($request->get('mardi'));
        foreach ($days as $day) {
            $dayName = $request->get($day);
            error_log($dayName);
            if (!empty($dayName)) {
                $res .= $dayName . ' - ';
            }
        }


        if ($res == '') {
            $res = 'aucune';
        } else {
            if (substr($res, -1) == ' ') {
//                $res = substr($res, -2);
            }
        }
        return $res;
    }

    function extractHoraire($val) {
        $res = '';
        switch ($val) {
            case 0:
                $res = 'matin (de 9h à 12h)';
                break;
            case 1:
                $res = 'après-midi (de 14h à 18h)';
                break;
            case 2:
                $res = 'soir (de 18h à 20h)';
                break;
            default :
                $res = 'aucune';
                break;
        }
        return $res;
    }

    public function bookRendezVousByEmail(Request $request) {
        $firstName = $request->get('prenom');
        $lastName = $request->get('nom');
        $sujet = $request->get('objet');
        $phoneNumber = $request->get('tel');
        $customerEmail = $request->get('email');
        $rawMessage = $request->get('message');
        $horaire = $this->extractHoraire($request->get('horaire'));
        $jours = $this->extractDays($request);

        // send email
        $message1 = '<!DOCTYPE html><html><head><meta charset="UTF-8" /></head><body> 
                Bonjour ' . $firstName . ' ' . $lastName . ', <br /><br />
                Le cabinet d\'ostéopathie de Mme Carole DINH a bien reçu votre message par rapport au sujet "' . $sujet . '". <br /><br />
                Votre demande sera traitée dans les meilleurs délais. <br />
                Merci de votre visite sur notre site Web <a href="' . env('SITE_URL') . '">' . env('SITE_URL') . '</a>.
                <br /><br /><br />--------------------------------------------------------<br />Cabinet d\'ostéopathie à Thionville</a><br />18 rue du Général Mangin <br /> 57100 Thionville <a target="_blank" href="https://www.google.fr/maps/dir/Ma+Position/18+Rue+Général+Mangin,+57100+Thionville"> <img  src="' . env('SITE_URL') . '/images/icons/google-directions.jpeg" title="Cliquer ici pour visualiser le trajet vers le cabinet d\'ostéopathie" alt="visualiser le trajet vers le cabinet d\'ostéopathie" /></a><br />Téléphone : <a style="text-decoration:none;" href="tel:' . env('PHONE_INT') . '">' . env('PHONE') . ' <img src="' . env('SITE_URL') . '/images/icons/call.png"></a><br /><br />Site Web : <a href="' . env('SITE_URL') . '">' . env('SITE_URL') . '</a> 
                </body></html>';

        $message2 = '<!DOCTYPE html><html><head><meta charset="UTF-8" /></head><body> 
                Adresse mail : ' . $customerEmail . '<br /><br />                
                Nom : ' . $lastName . '<br /><br />
                Prénom : ' . $firstName . '<br /><br />
                Téléphone : ' . $phoneNumber . ' <br /><br />                
                Objet du message : ' . $sujet . '<br /><br />
                Message : ' . $rawMessage . ' <br /><br /><br />
                Jours préférés : ' . $jours . ' <br /><br />
                Horaire préféré : ' . $horaire . ' <br /><br />
                </body></html>';

        file_put_contents('debug.html', $message1);

        file_put_contents('debug.html', $message2, 8);

        if (env('SEND_MAIL') === true) {
//            $lang = Config::get('app.locale');
            $headers1 = "From: Cabinet d'ostéopathie à Thionville <" . env('SECRETARIAT_EMAIL', 'dinh.osteopathe@gmail.com') . ">";
            $headers1 = 'MIME-Version: 1.0' . "\r\n";
            $headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            mail($customerEmail, $sujet, $message1, $headers1);

            $headers2 = "From: Cabinet d'ostéopathie à Thionville <" . $customerEmail . ">";
            $headers2 = 'MIME-Version: 1.0' . "\r\n";
            $headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            mail(env('SECRETARIAT_EMAIL'), $sujet, $message2, $headers2);
        }
    }

}
