<?php


namespace App\Services\CalculationServices;


use App\Models\Serviceperson\Serviceperson;
use Illuminate\View\View;

class ParadeStateService
{
    /**
     * @return mixed
     */
    public static function strengthByStatus()
    {
       return Serviceperson::selectRaw('count(*) as total')
            ->selectRaw("count(case when serviceperson_status_id = 1 then 1 end) as available")
            ->selectRaw("count(case when serviceperson_status_id = 2 then 1 end) as privilegeLeave")
            ->selectRaw("count(case when serviceperson_status_id = 3 then 1 end) as sickLeave")
            ->selectRaw("count(case when serviceperson_status_id = 4 then 1 end) as internalTraining")
            ->selectRaw("count(case when serviceperson_status_id = 5 then 1 end) as inServiceTraining")
            ->selectRaw("count(case when serviceperson_status_id = 6 then 1 end) as overseasTraining")
            ->selectRaw("count(case when serviceperson_status_id = 7 then 1 end) as resettlement")
            ->selectRaw("count(case when serviceperson_status_id = 8 then 1 end) as awol")
            ->first();
    }

//    public static function strengthByGender()
//    {
//        return Serviceperson::query()
//            ->join('national_id_cards', 'servicepeople.number', '=', 'national_id_cards.serviceperson_number' )
//            ->join( 'promotions', 'servicepeople.number', '=', 'promotions.serviceperson_number')
//            ->selectRaw( 'count(*) as total')
//            ->selectRaw("count(DISTINCT (CASE WHEN national_id_cards.gender_id = 1 and promotions.rank_id >= 9 then servicepeople.number end)) as maleOfficers")
//            ->selectRaw("count(DISTINCT (CASE WHEN national_id_cards.gender_id = 2 and promotions.rank_id >= 9 then servicepeople.number end)) as femaleOfficers")
//            ->selectRaw("count(DISTINCT (CASE WHEN national_id_cards.gender_id = 1 and promotions.rank_id <= 8 then servicepeople.number end)) as maleEnlisted")
//            ->selectRaw("count(DISTINCT (CASE WHEN national_id_cards.gender_id = 2 and promotions.rank_id <= 8 then servicepeople.number end)) as femaleEnlisted")
//            ->selectRaw("count(DISTINCT (CASE WHEN national_id_cards.gender_id = 1 and promotions.rank_id = 1 then servicepeople.number end)) as maleRecruits")
//            ->selectRaw("count(DISTINCT (CASE WHEN national_id_cards.gender_id = 2 and promotions.rank_id = 1 then servicepeople.number end)) as femaleRecruits")
//            ->get();
//    }

    /**
     * @param $rankId
     * @return mixed
     */
    public static function strengthByRank($rankId)
    {
        return Serviceperson::where(function ($q){
            $q->select('rank_id')
                ->from('promotions')
                ->whereColumn('serviceperson_number', 'servicepeople.number')
                ->orderByDesc('promoted_on')
                ->limit(1);
        }, $rankId)
            ->selectRaw('count(*) as total')
            ->selectRaw("count(case when serviceperson_status_id = 1 then 1 end) as available")
            ->selectRaw("count(case when serviceperson_status_id = 2 then 1 end) as privilegeLeave ")
            ->selectRaw("count(case when serviceperson_status_id = 3 then 1 end) as sickLeave")
            ->selectRaw("count(case when serviceperson_status_id = 4 then 1 end) as internalTraining")
            ->selectRaw("count(case when serviceperson_status_id = 5 then 1 end) as inServiceTraining")
            ->selectRaw("count(case when serviceperson_status_id = 6 then 1 end) as overseasTraining")
            ->selectRaw("count(case when serviceperson_status_id = 7 then 1 end) as resettlement")
            ->selectRaw("count(case when serviceperson_status_id = 8 then 1 end) as awol")
            ->first();
    }



    /**
     * Outputs variables to the Parade State view
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('status', self::strengthByStatus());
        $view->with('recruit', self::strengthByRank(1));
        $view->with('private', self::strengthByRank(2));
        $view->with('lanceCorporal', self::strengthByRank(3));
        $view->with('corporal', self::strengthByRank(4));
        $view->with('sergeant', self::strengthByRank(5));
        $view->with('staffSergeant', self::strengthByRank(6));
        $view->with('warrantOfficerTwo', self::strengthByRank(7));
        $view->with('warrantOfficerOne', self::strengthByRank(8));
        $view->with('officerCadet', self::strengthByRank(9));
        $view->with('secondLieutenant', self::strengthByRank(10));
        $view->with('lieutenant', self::strengthByRank(11));
        $view->with('captain', self::strengthByRank(12));
        $view->with('major', self::strengthByRank(13));
        $view->with('lieutenantColonel', self::strengthByRank(14));
        $view->with('colonel', self::strengthByRank(15));
    }
}
