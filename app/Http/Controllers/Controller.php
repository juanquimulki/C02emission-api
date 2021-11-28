<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function response($success,$result,$code) {
        $array = ["success"=>$success,"rows"=>$result];
        return response()->json($array,$code);
    }
}
