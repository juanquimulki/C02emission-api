<?php

namespace App\Models;

class State
{
    private $states = [
        "Alabama" => "AL.A",
        "California" => "CA.A",
        "Hawaii" => "HI.A"
    ];

    public function getStates() {
        return $this->states;
    }
}