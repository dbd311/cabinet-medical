<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use App\Http\Requests;

use Illuminate\Support\Facades\Request;

/**
 * Tarifs controller
 * @author Duy Dinh
 * @date 18/06/2016
 * 
 */
class TarifsController extends Controller {

    public function showTarifs() {
        return view('pages.tarifs')->with('active', 5);
    }

    /**     * tarifs from a to z ** */
    public function showReimbursements() {
        $curURL = Request::url();
        $fields = explode('/', $curURL);
        $suffix = end($fields);
//        error_log($suffix);
        return view('pages.reimbursements.template', ['suffix' => strtolower($suffix), 'active' => 5]);
    }

    public function loadReimbursements($suffix) {
//        error_log(resource_path('data/json/reimbursement_' . $suffix . '.json'));
        $content = file_get_contents(resource_path('data/json/reimbursement_' . $suffix . '.json'));
        return \Response::json(json_decode($content));
    }

}
