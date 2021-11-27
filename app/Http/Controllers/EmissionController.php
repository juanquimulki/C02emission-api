<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\State as State;


class EmissionController extends Controller
{
    public function read() {
        $stateObj = new State();
        $stateQuery = $stateObj->getStates()["Hawaii"];

        $requestUrl  = env("HTTP_URL");
        $parameters = ["{%a}", "{%s}"];
        $data   = [env("API_KEY"), $stateQuery];
        
        $requestUrl = str_replace($parameters, $data, $requestUrl);

        $response = Http::get($requestUrl);
        echo json_encode($response->json());
    }
}
