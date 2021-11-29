<?php

namespace App\Models;

class State
{
    private $states = [
        "Alabama" => "AL.A",
        "Alaska" => "AK.A",
        "Arizona" => "AZ.A",
        "Arkansas" => "AR.A",
        "California" => "CA.A",
        "Colorado" => "CO.A",
        "Connecticut" => "CT.A",
        "Delaware" => "DE.A",
        "District of Columbia" => "DC.A",
        "Florida" => "FL.A",
        "Georgia" => "GA.A",
        "Hawaii" => "HI.A",
        "Idaho" => "ID.A",
        "Illinois" => "IL.A",
        "Indiana" => "IN.A",
        "Iowa" => "IA.A",
        "Kansas" => "KS.A",
        "Kentucky" => "KY.A",
        "Louisiana" => "LA.A",
        "Maine" => "ME.A",
        "Maryland" => "MD.A",
        "Massachusetts" => "MA.A",
        "Michigan" => "MI.A",
        "Minnesota" => "MN.A",
        "Mississippi" => "MS.A",
        "Missouri" => "MO.A",
        "Montana" => "MT.A",
        "Nebraska" => "NE.A",
        "Nevada" => "NV.A",
        "New Hampshire" => "NH.A",
        "New Jersey" => "NJ.A",
        "New Mexico" => "NM.A",
        "New York" => "NY.A",
        "North Carolina" => "NC.A",
        "North Dakota" => "ND.A",
        "Ohio" => "OH.A",
        "Oklahoma" => "OK.A",
        "Oregon" => "OR.A",
        "Pennsylvania" => "PA.A",
        "Rhode Island" => "RI.A",
        "South Carolina" => "SC.A",
        "South Dakota" => "SD.A",
        "Tennessee" => "TN.A",
        "Texas" => "TX.A",
        "Utah" => "UT.A",
        "Vermont" => "VT.A",
        "Virginia" => "VA.A",
        "Washington" => "WA.A",
        "West Virginia" => "WV.A",
        "Wisconsin" => "WI.A",
        "Wyoming" => "WY.A",
    ];

    public function getStates() {
        return $this->states;
    }
}