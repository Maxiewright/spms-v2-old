<?php


namespace App\Services\ServicepersonServices;

class RetirementService
{
    public static function getRetirementDate($currentRank, $dateOfBirth)
    {
        $retirementAge = '';
        if($currentRank <= 4 ){
            $retirementAge = 45;
        } else if ($currentRank >= 5 && $currentRank <= 6 || $currentRank >=9 && $currentRank <=13){
            $retirementAge = 47;
        } else if ($currentRank >= 7 && $currentRank <= 8 || $currentRank == 14 ) {
            $retirementAge = 50;
        } else if ($currentRank >= 15){
            $retirementAge = 55;
        }
        return $dateOfBirth->addYears($retirementAge);
    }
}
