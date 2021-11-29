<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Models\State as State;


class EmissionController extends Controller
{
    // public function validator() {
    //     $data = [
    //         'state' => $request->state,
    //         'from' => $request->from,
    //         'to' => $request->to,
    //     ];

    //     $validator = \Validator::make($data, [
    //         'state' => ['required'],
    //         'from' => ['required'],
    //         'to' => ['required']
    //     ]);
    
    //     if ($validator->fails()) {
    //         return parent::response(false,$validator->errors(),400);
    //     }
    // }
    
    public function readOne(Request $request) {
        $state = str_replace("%20"," ", $request->state);
        $arrayResponse = array();
        array_push($arrayResponse, [
            "state" => $state,
            "from"  => $request->from,
            "to"    => $request->to,
            "value" => $this->getData(
                $state, 
                $request->from, 
                $request->to, 
                $this->getRequestUrl($state)
            )
        ]);

        return parent::response(true, $arrayResponse, 200);
    }

    public function readAll(Request $request) {
        $arrayResponse = array();
        $stateObj = new State();
        $statesList = $stateObj->getStates();

        foreach ($statesList as $state => $code) {
            array_push($arrayResponse, [
                "state" => $state,
                "from"  => $request->from,
                "to"    => $request->to,
                "value" => $this->getData($state, $request->from, $request->to, $this->getRequestUrl($state))
            ]);
        }

        return parent::response(true,$arrayResponse,200);
    }

    private function getData($state, $from, $to, $requestUrl) {
        $response = Http::get($requestUrl);
        $arrayData = $response->json()["series"][0]["data"];

        $sum = 0;
        for ($i = env("YEAR_MAX") - $from; $i >= env("YEAR_MAX") - $to; $i--) {
            $sum += $arrayData[$i][1];
        }

        return round($sum,1) . " million";    
    }

    private function getRequestUrl($state) {
        $stateObj = new State();
        $stateQuery = $stateObj->getStates()[$state];

        $requestUrl  = env("HTTP_URL");
        $parameters = ["{%a}", "{%s}"];
        $data   = [env("API_KEY"), $stateQuery];
        
        $requestUrl = str_replace($parameters, $data, $requestUrl);

        return $requestUrl;
    }
}
