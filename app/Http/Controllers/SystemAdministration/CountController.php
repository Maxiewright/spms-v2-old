<?php

namespace App\Http\Controllers\SystemAdministration;


use App\Http\Controllers\Controller;
use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Support\Facades\DB;


class CountController extends Controller
{

//Count Servicepeople by gender
    public static function genderCount($gender_id, $operator, $rank_id){
        $genderCount = DB::table('servicepeople')
            ->join('national_identification_cards', 'servicepeople.number', '=', 'national_identification_cards.serviceperson_service_number' )
            ->Join( 'promotions', 'servicepeople.number', '=', 'promotions.serviceperson_service_number')
            ->where('national_identification_cards.serviceperson_gender', '=', $gender_id)
            ->where('promotions.rank_id', $operator, $rank_id)
            ->get();

       return $genderCount->groupBy('number')->count();
    }

//    Parade State
//    Count personnel by rank
    public static function  rankCount($id)
    {
        Return Rank::find($id)
            ->serviceperson()
            ->with('rank')
            ->where('serviceperson_service_number' ,'!=', null)
            ->get()
            ->count('pivot.rank_id');
    }


}
