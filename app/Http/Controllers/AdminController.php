<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Auth;

/**
 * Admin controller
 * @author Duy Dinh
 * @date 18/06/2016
 * 
 */
class AdminController extends Controller {

    public function generateSiteMap() {
        // create new sitemap object
        $sm = App::make("sitemap");

        // add items to the sitemap (url, date, priority, freq)
        $dailyFreq = 'daily';
        $weeklyFreq = 'weekly';
        $monthlyFreq = 'monthly';

        $now = date("Y-m-d H:i:s");
        $topPriority = '1.0';
        $normalPriority = '0.8';
        $lessPriority = '0.5';

        $sm->add(URL::to('/'), $now, $topPriority, $dailyFreq);
        $sm->add(URL::to('/accueil'), $now, $topPriority, $dailyFreq);
        $sm->add(URL::to('/home'), $now, $topPriority, $dailyFreq);
        $sm->add(URL::to('/index'), $now, $topPriority, $dailyFreq);

        $sm->add(URL::to('/osteopathie'), $now, $topPriority, $dailyFreq);

        // indications and sub-pages
        $sm->add(URL::to('/indications'), $now, $topPriority, $weeklyFreq);
        $sm->add(URL::to('/indications/osteopathie-tout-age'), $now, $normalPriority, $weeklyFreq);
        $sm->add(URL::to('/indications/osteopathie-et-seniors'), $now, $normalPriority, $weeklyFreq);
        $sm->add(URL::to('/indications/osteopathie-et-nourrissons'), $now, $normalPriority, $weeklyFreq);
        $sm->add(URL::to('/indications/osteopathie-et-enfants'), $now, $normalPriority, $weeklyFreq);
        $sm->add(URL::to('/indications/osteopathie-et-adultes'), $now, $normalPriority, $weeklyFreq);
        $sm->add(URL::to('/indications/osteopathie-et-sportifs'), $now, $normalPriority, $weeklyFreq);
        $sm->add(URL::to('/indications/osteopathie-et-femmes-enceintes'), $now, $normalPriority, $weeklyFreq);
        $sm->add(URL::to('/indications/osteopathie-et-handicap'), $now, $normalPriority, $weeklyFreq);
        $sm->add(URL::to('/indications/osteopathie-articulaire'), $now, $normalPriority, $weeklyFreq);
        $sm->add(URL::to('/indications/osteopathie-viscerale'), $now, $normalPriority, $weeklyFreq);

        $sm->add(URL::to('/consultation'), $now, $topPriority, $weeklyFreq);
        $sm->add(URL::to('/questions-frequentes'), $now, $topPriority, $weeklyFreq);
        $sm->add(URL::to('/le-cabinet'), $now, $topPriority, $weeklyFreq);
        $sm->add(URL::to('/divers'), $now, $normalPriority, $monthlyFreq);
        $sm->add(URL::to('/actualites'), $now, $normalPriority, $monthlyFreq);
        $sm->add(URL::to('/feeds'), $now, $normalPriority, $dailyFreq);

        $sm->add(URL::to('/rendez-vous'), $now, $topPriority, $dailyFreq);
        $sm->add(URL::to('/sitemap'), $now, $normalPriority, $monthlyFreq);
        $sm->add(URL::to('/mentions-legales'), $now, $normalPriority, $monthlyFreq);

        $sm->add(URL::to('/tarifs-et-remboursements'), $now, $topPriority, $monthlyFreq);

        $sm->add(URL::to('/tarifs-et-remboursements/a'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/b'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/c'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/d'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/e'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/f'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/g'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/h'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/i'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/j'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/k'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/l'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/m'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/n'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/o'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/p'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/q'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/r'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/s'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/t'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/u'), $now, $lessPriority, $monthlyFreq);
        $sm->add(URL::to('/tarifs-et-remboursements/v'), $now, $lessPriority, $monthlyFreq);


        // generate your sitemap (format, filename)
        $sm->store('xml', 'sitemap');
        // this will generate file sitemap.xml to your public folder
        $content = file_get_contents('sitemap.xml');
        $output = str_replace('http://localhost:8000', env('SITE_URL', 'http://www.osteo-thionville.fr'), $content);
        file_put_contents('sitemap.xml', $output);
        echo '<html><body><pre>' . $output . '</pre></body></html>';
//        return redirect()->to('/');
    }
    
}
