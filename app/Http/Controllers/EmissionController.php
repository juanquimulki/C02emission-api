<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Models\State as State;


class EmissionController extends Controller
{
    public function read(Request $request) {
        $stateObj = new State();
        $stateQuery = $stateObj->getStates()[$request->state];

        $requestUrl  = env("HTTP_URL");
        $parameters = ["{%a}", "{%s}"];
        $data   = [env("API_KEY"), $stateQuery];
        
        $requestUrl = str_replace($parameters, $data, $requestUrl);
        $response = Http::get($requestUrl);

        $arrayData = $response->json()["series"][0]["data"];

        $sum = 0;
        for ($i = env("YEAR_MAX") - $request->from; $i >= env("YEAR_MAX") - $request->to; $i--) {
            $sum += $arrayData[$i][1];
        }

        echo round($sum,1) . " million";
    }
}
