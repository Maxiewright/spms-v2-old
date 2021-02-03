<?php


namespace App\Services\ServicepersonServices;


use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;


class ServicepersonService
{

    private $serviceperson;

    public function __construct(Serviceperson $serviceperson)
    {
        $this->serviceperson = $serviceperson;
    }

    /**
     * Groups servicepeople by officers and other ranks and gender and counts them
     *
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public static function strengthByGender()
    {
        return Serviceperson::query()
            ->join('national_id_cards', 'servicepeople.number', '=', 'national_id_cards.serviceperson_number' )
            ->join( 'promotions', 'servicepeople.number', '=', 'promotions.serviceperson_number')
            ->selectRaw( 'count(*) as total')
            ->selectRaw("count(DISTINCT (CASE WHEN national_id_cards.gender_id = 1 and promotions.rank_id >= 9 then servicepeople.number end)) as maleOfficers")
            ->selectRaw("count(DISTINCT (CASE WHEN national_id_cards.gender_id = 2 and promotions.rank_id >= 9 then servicepeople.number end)) as femaleOfficers")
            ->selectRaw("count(DISTINCT (CASE WHEN national_id_cards.gender_id = 1 and promotions.rank_id <= 8 then servicepeople.number end)) as maleEnlisted")
            ->selectRaw("count(DISTINCT (CASE WHEN national_id_cards.gender_id = 2 and promotions.rank_id <= 8 then servicepeople.number end)) as femaleEnlisted")
            ->selectRaw("count(DISTINCT (CASE WHEN national_id_cards.gender_id = 1 and promotions.rank_id = 1 then servicepeople.number end)) as maleRecruits")
            ->selectRaw("count(DISTINCT (CASE WHEN national_id_cards.gender_id = 2 and promotions.rank_id = 1 then servicepeople.number end)) as femaleRecruits")
            ->first();
    }

    /**
     * returns serviceperson's previous unit
     */
    public function previousUnit($unit)
    {
       return Unit::where('id', '<', $unit->id)
           ->where(function ($q){
               $q->where('serviceperson_number', session('serviceNumber'));
           })
           ->orderBy('id', 'desc')
           ->first();
    }

}
