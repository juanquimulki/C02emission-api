<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Models\State as State;


class StateController extends Controller
{
    public function readAll() {
        $stateObj = new State();
        $statesList = $stateObj->getStates();

        $arrayResponse = array();
        foreach ($statesList as $state => $code) {
            array_push($arrayResponse, $state);
        }

        return parent::response(true, $arrayResponse, 200);
    }
}
