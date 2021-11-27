<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;


class EmissionController extends Controller
{
    public function read() {
        $response = Http::get('http://api.eia.gov/series/?api_key=716d8ee6f436e586d712e03ae8105bab&series_id=EMISS.CO2-TOTV-EC-CO-CA.A');

        echo json_encode($response->json());
    }
}
