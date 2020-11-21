<?php


namespace App\Services\CareerManagementServices;


use App\Models\Serviceperson\Serviceperson;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\StreamEstablishment;
use Illuminate\Support\Facades\DB;

class StreamService implements ManpowerService
{

    public static function strength()
    {
        return self::stream(Serviceperson::query()->enlisted());
    }

    public static function establishment()
    {
//        return self::stream(StreamEstablishment::query())
        return StreamEstablishment::query()
//           Combat Support
            ->selectRaw("sum(CASE WHEN stream_id = 1 THEN establishment ELSE 0 END) as combatSupportTotal")
            ->selectRaw("sum(CASE WHEN stream_id = 1 and rank_id = 2 THEN establishment ELSE 0 END) as combatSupportPte")
            ->selectRaw("sum(CASE WHEN stream_id = 1 and rank_id = 3 THEN establishment ELSE 0 END) as combatSupportLCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 1 and rank_id = 4 THEN establishment ELSE 0 END) as combatSupportCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 1 and rank_id = 5 THEN establishment ELSE 0 END) as combatSupportSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 1 and rank_id = 6 THEN establishment ELSE 0 END) as combatSupportSSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 1 and rank_id = 7 THEN establishment ELSE 0 END) as combatSupportWO1")
            ->selectRaw("sum(CASE WHEN stream_id = 1 and rank_id = 8 THEN establishment ELSE 0 END) as combatSupportWO2")
//           Operations
            ->selectRaw("sum(CASE WHEN stream_id = 2 THEN establishment ELSE 0 END) as operationsTotal")
            ->selectRaw("sum(CASE WHEN stream_id = 2 and rank_id = 2 THEN establishment ELSE 0 END) as operationsPte")
            ->selectRaw("sum(CASE WHEN stream_id = 2 and rank_id = 3 THEN establishment ELSE 0 END) as operationsLCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 2 and rank_id = 4 THEN establishment ELSE 0 END) as operationsCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 2 and rank_id = 5 THEN establishment ELSE 0 END) as operationsSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 2 and rank_id = 6 THEN establishment ELSE 0 END) as operationsSSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 2 and rank_id = 7 THEN establishment ELSE 0 END) as operationsWO1")
            ->selectRaw("sum(CASE WHEN stream_id = 2 and rank_id = 8 THEN establishment ELSE 0 END) as operationsWO2")
//           Intelligence
            ->selectRaw("sum(CASE WHEN stream_id = 3 THEN establishment ELSE 0 END) as intelligenceTotal")
            ->selectRaw("sum(CASE WHEN stream_id = 3 and rank_id = 2 THEN establishment ELSE 0 END) as intelligencePte")
            ->selectRaw("sum(CASE WHEN stream_id = 3 and rank_id = 3 THEN establishment ELSE 0 END) as intelligenceLCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 3 and rank_id = 4 THEN establishment ELSE 0 END) as intelligenceCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 3 and rank_id = 5 THEN establishment ELSE 0 END) as intelligenceSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 3 and rank_id = 6 THEN establishment ELSE 0 END) as intelligenceSSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 3 and rank_id = 7 THEN establishment ELSE 0 END) as intelligenceWO1")
            ->selectRaw("sum(CASE WHEN stream_id = 3 and rank_id = 8 THEN establishment ELSE 0 END) as intelligenceWO2")
//           Special Forces
            ->selectRaw("sum(CASE WHEN stream_id = 4 THEN establishment ELSE 0 END) as sfodTotal")
            ->selectRaw("sum(CASE WHEN stream_id = 4 and rank_id = 2 THEN establishment ELSE 0 END) as sfodPte")
            ->selectRaw("sum(CASE WHEN stream_id = 4 and rank_id = 3 THEN establishment ELSE 0 END) as sfodLCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 4 and rank_id = 4 THEN establishment ELSE 0 END) as sfodCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 4 and rank_id = 5 THEN establishment ELSE 0 END) as sfodSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 4 and rank_id = 6 THEN establishment ELSE 0 END) as sfodSSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 4 and rank_id = 7 THEN establishment ELSE 0 END) as sfodWO1")
            ->selectRaw("sum(CASE WHEN stream_id = 4 and rank_id = 8 THEN establishment ELSE 0 END) as sfodWO2")
//           Provost
            ->selectRaw("sum(CASE WHEN stream_id = 5 THEN establishment ELSE 0 END) as provostTotal")
            ->selectRaw("sum(CASE WHEN stream_id = 5 and rank_id = 2 THEN establishment ELSE 0 END) as provostPte")
            ->selectRaw("sum(CASE WHEN stream_id = 5 and rank_id = 3 THEN establishment ELSE 0 END) as provostLCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 5 and rank_id = 4 THEN establishment ELSE 0 END) as provostCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 5 and rank_id = 5 THEN establishment ELSE 0 END) as provostSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 5 and rank_id = 6 THEN establishment ELSE 0 END) as provostSSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 5 and rank_id = 7 THEN establishment ELSE 0 END) as provostWO1")
            ->selectRaw("sum(CASE WHEN stream_id = 5 and rank_id = 8 THEN establishment ELSE 0 END) as provostWO2")
//           Clerical
            ->selectRaw("sum(CASE WHEN stream_id = 6 THEN establishment ELSE 0 END) as clericalTotal")
            ->selectRaw("sum(CASE WHEN stream_id = 6 and rank_id = 2 THEN establishment ELSE 0 END) as clericalPte")
            ->selectRaw("sum(CASE WHEN stream_id = 6 and rank_id = 3 THEN establishment ELSE 0 END) as clericalLCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 6 and rank_id = 4 THEN establishment ELSE 0 END) as clericalCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 6 and rank_id = 5 THEN establishment ELSE 0 END) as clericalSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 6 and rank_id = 6 THEN establishment ELSE 0 END) as clericalSSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 6 and rank_id = 7 THEN establishment ELSE 0 END) as clericalWO1")
            ->selectRaw("sum(CASE WHEN stream_id = 6 and rank_id = 8 THEN establishment ELSE 0 END) as clericalWO2")
//           Health
            ->selectRaw("sum(CASE WHEN stream_id = 7 THEN establishment ELSE 0 END) as healthTotal")
            ->selectRaw("sum(CASE WHEN stream_id = 7 and rank_id = 2 THEN establishment ELSE 0 END) as healthPte")
            ->selectRaw("sum(CASE WHEN stream_id = 7 and rank_id = 3 THEN establishment ELSE 0 END) as healthLCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 7 and rank_id = 4 THEN establishment ELSE 0 END) as healthCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 7 and rank_id = 5 THEN establishment ELSE 0 END) as healthSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 7 and rank_id = 6 THEN establishment ELSE 0 END) as healthSSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 7 and rank_id = 7 THEN establishment ELSE 0 END) as healthWO1")
            ->selectRaw("sum(CASE WHEN stream_id = 7 and rank_id = 8 THEN establishment ELSE 0 END) as healthWO2")
//           Musical
            ->selectRaw("sum(CASE WHEN stream_id = 8 THEN establishment ELSE 0 END) as musicalTotal")
            ->selectRaw("sum(CASE WHEN stream_id = 8 and rank_id = 2 THEN establishment ELSE 0 END) as musicalPte")
            ->selectRaw("sum(CASE WHEN stream_id = 8 and rank_id = 3 THEN establishment ELSE 0 END) as musicalLCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 8 and rank_id = 4 THEN establishment ELSE 0 END) as musicalCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 8 and rank_id = 5 THEN establishment ELSE 0 END) as musicalSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 8 and rank_id = 6 THEN establishment ELSE 0 END) as musicalSSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 8 and rank_id = 7 THEN establishment ELSE 0 END) as musicalWO1")
            ->selectRaw("sum(CASE WHEN stream_id = 8 and rank_id = 8 THEN establishment ELSE 0 END) as musicalWO2")
//           Information Communication Technology
            ->selectRaw("sum(CASE WHEN stream_id = 9 THEN establishment ELSE 0 END) as ictTotal")
            ->selectRaw("sum(CASE WHEN stream_id = 9 and rank_id = 2 THEN establishment ELSE 0 END) as ictPte")
            ->selectRaw("sum(CASE WHEN stream_id = 9 and rank_id = 3 THEN establishment ELSE 0 END) as ictLCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 9 and rank_id = 4 THEN establishment ELSE 0 END) as ictCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 9 and rank_id = 5 THEN establishment ELSE 0 END) as ictSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 9 and rank_id = 6 THEN establishment ELSE 0 END) as ictSSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 9 and rank_id = 7 THEN establishment ELSE 0 END) as ictWO1")
            ->selectRaw("sum(CASE WHEN stream_id = 9 and rank_id = 8 THEN establishment ELSE 0 END) as ictWO2")
//           Supply
            ->selectRaw("sum(CASE WHEN stream_id = 10 THEN establishment ELSE 0 END) as supplyTotal")
            ->selectRaw("sum(CASE WHEN stream_id = 10 and rank_id = 2 THEN establishment ELSE 0 END) as supplyPte")
            ->selectRaw("sum(CASE WHEN stream_id = 10 and rank_id = 3 THEN establishment ELSE 0 END) as supplyLCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 10 and rank_id = 4 THEN establishment ELSE 0 END) as supplyCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 10 and rank_id = 5 THEN establishment ELSE 0 END) as supplySgt")
            ->selectRaw("sum(CASE WHEN stream_id = 10 and rank_id = 6 THEN establishment ELSE 0 END) as supplySSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 10 and rank_id = 7 THEN establishment ELSE 0 END) as supplyWO1")
            ->selectRaw("sum(CASE WHEN stream_id = 10 and rank_id = 8 THEN establishment ELSE 0 END) as supplyWO2")
//           Transportation
            ->selectRaw("sum(CASE WHEN stream_id = 11 THEN establishment ELSE 0 END) as transportTotal")
            ->selectRaw("sum(CASE WHEN stream_id = 11 and rank_id = 2 THEN establishment ELSE 0 END) as transportPte")
            ->selectRaw("sum(CASE WHEN stream_id = 11 and rank_id = 3 THEN establishment ELSE 0 END) as transportLCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 11 and rank_id = 4 THEN establishment ELSE 0 END) as transportCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 11 and rank_id = 5 THEN establishment ELSE 0 END) as transportSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 11 and rank_id = 6 THEN establishment ELSE 0 END) as transportSSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 11 and rank_id = 7 THEN establishment ELSE 0 END) as transportWO1")
            ->selectRaw("sum(CASE WHEN stream_id = 11 and rank_id = 8 THEN establishment ELSE 0 END) as transportWO2")
//           Food
            ->selectRaw("sum(CASE WHEN stream_id = 12 THEN establishment ELSE 0 END) as foodTotal")
            ->selectRaw("sum(CASE WHEN stream_id = 12 and rank_id = 2 THEN establishment ELSE 0 END) as foodPte")
            ->selectRaw("sum(CASE WHEN stream_id = 12 and rank_id = 3 THEN establishment ELSE 0 END) as foodLCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 12 and rank_id = 4 THEN establishment ELSE 0 END) as foodCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 12 and rank_id = 5 THEN establishment ELSE 0 END) as foodSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 12 and rank_id = 6 THEN establishment ELSE 0 END) as foodSSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 12 and rank_id = 7 THEN establishment ELSE 0 END) as foodWO1")
            ->selectRaw("sum(CASE WHEN stream_id = 12 and rank_id = 8 THEN establishment ELSE 0 END) as foodWO2")
//           Artisan
            ->selectRaw("sum(CASE WHEN stream_id = 13 THEN establishment ELSE 0 END) as artisanTotal")
            ->selectRaw("sum(CASE WHEN stream_id = 13 and rank_id = 2 THEN establishment ELSE 0 END) as artisanPte")
            ->selectRaw("sum(CASE WHEN stream_id = 13 and rank_id = 3 THEN establishment ELSE 0 END) as artisanLCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 13 and rank_id = 4 THEN establishment ELSE 0 END) as artisanCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 13 and rank_id = 5 THEN establishment ELSE 0 END) as artisanSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 13 and rank_id = 6 THEN establishment ELSE 0 END) as artisanSSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 13 and rank_id = 7 THEN establishment ELSE 0 END) as artisanWO1")
            ->selectRaw("sum(CASE WHEN stream_id = 13 and rank_id = 8 THEN establishment ELSE 0 END) as artisanWO2")
//           Specialist
            ->selectRaw("sum(CASE WHEN stream_id = 14 THEN establishment ELSE 0 END) as specialistTotal")
            ->selectRaw("sum(CASE WHEN stream_id = 14 and rank_id = 2 THEN establishment ELSE 0 END) as specialistPte")
            ->selectRaw("sum(CASE WHEN stream_id = 14 and rank_id = 3 THEN establishment ELSE 0 END) as specialistLCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 14 and rank_id = 4 THEN establishment ELSE 0 END) as specialistCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 14 and rank_id = 5 THEN establishment ELSE 0 END) as specialistSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 14 and rank_id = 6 THEN establishment ELSE 0 END) as specialistSSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 14 and rank_id = 7 THEN establishment ELSE 0 END) as specialistWO1")
            ->selectRaw("sum(CASE WHEN stream_id = 14 and rank_id = 8 THEN establishment ELSE 0 END) as specialistWO2")
//           technical
            ->selectRaw("sum(CASE WHEN stream_id = 15 THEN establishment ELSE 0 END) as technicianTotal")
            ->selectRaw("sum(CASE WHEN stream_id = 15 and rank_id = 2 THEN establishment ELSE 0 END) as technicianPte")
            ->selectRaw("sum(CASE WHEN stream_id = 15 and rank_id = 3 THEN establishment ELSE 0 END) as technicianLCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 15 and rank_id = 4 THEN establishment ELSE 0 END) as technicianCpl")
            ->selectRaw("sum(CASE WHEN stream_id = 15 and rank_id = 5 THEN establishment ELSE 0 END) as technicianSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 15 and rank_id = 6 THEN establishment ELSE 0 END) as technicianSSgt")
            ->selectRaw("sum(CASE WHEN stream_id = 15 and rank_id = 7 THEN establishment ELSE 0 END) as technicianWO1")
            ->selectRaw("sum(CASE WHEN stream_id = 15 and rank_id = 8 THEN establishment ELSE 0 END) as technicianWO2")
//           Overall Totals
            ->selectRaw("sum(CASE WHEN rank_id = 2 THEN establishment ELSE 0 END) as Pte")
            ->selectRaw("sum(CASE WHEN rank_id = 3 THEN establishment ELSE 0 END) as LCpl")
            ->selectRaw("sum(CASE WHEN rank_id = 4 THEN establishment ELSE 0 END) as Cpl")
            ->selectRaw("sum(CASE WHEN rank_id = 5 THEN establishment ELSE 0 END) as Sgt")
            ->selectRaw("sum(CASE WHEN rank_id = 6 THEN establishment ELSE 0 END) as SSgt")
            ->selectRaw("sum(CASE WHEN rank_id = 7 THEN establishment ELSE 0 END) as WO2")
            ->selectRaw("sum(CASE WHEN rank_id = 8 THEN establishment ELSE 0 END) as WO1")
            ->selectRaw('sum(establishment) as total')
            ->first();
    }

    private static function stream($model)
    {
        return

            $model->selectRaw("count(case when stream_id = 1 and rank_id = 2 then 1 end) as combatSupportPte")
                ->selectRaw("count(case when stream_id = 1 and rank_id = 3 then 1 end) as combatSupportLCpl")
                ->selectRaw("count(case when stream_id = 1 and rank_id = 4 then 1 end) as combatSupportCpl")
                ->selectRaw("count(case when stream_id = 1 and rank_id = 5 then 1 end) as combatSupportSgt")
                ->selectRaw("count(case when stream_id = 1 and rank_id = 6 then 1 end) as combatSupportSSgt")
                ->selectRaw("count(case when stream_id = 1 and rank_id = 7 then 1 end) as combatSupportWO2")
                ->selectRaw("count(case when stream_id = 1 and rank_id = 8 then 1 end) as combatSupportWO1")
                ->selectRaw("count(case when stream_id = 1 then 1 end) as combatSupportTotal")

//            Operations
                ->selectRaw("count(case when stream_id = 2 and rank_id = 2 then 1 end) as operationsPte")
                ->selectRaw("count(case when stream_id = 2 and rank_id = 3 then 1 end) as operationsLCpl")
                ->selectRaw("count(case when stream_id = 2 and rank_id = 4 then 1 end) as operationsCpl")
                ->selectRaw("count(case when stream_id = 2 and rank_id = 5 then 1 end) as operationsSgt")
                ->selectRaw("count(case when stream_id = 2 and rank_id = 6 then 1 end) as operationsSSgt")
                ->selectRaw("count(case when stream_id = 2 and rank_id = 7 then 1 end) as operationsWO2")
                ->selectRaw("count(case when stream_id = 2 and rank_id = 8 then 1 end) as operationsWO1")
                ->selectRaw("count(case when stream_id = 2 then 1 end) as operationsTotal")

//            Intelligence
                ->selectRaw("count(case when stream_id = 3 and rank_id = 2 then 1 end) as intelligencePte")
                ->selectRaw("count(case when stream_id = 3 and rank_id = 3 then 1 end) as intelligenceLCpl")
                ->selectRaw("count(case when stream_id = 3 and rank_id = 4 then 1 end) as intelligenceCpl")
                ->selectRaw("count(case when stream_id = 3 and rank_id = 5 then 1 end) as intelligenceSgt")
                ->selectRaw("count(case when stream_id = 3 and rank_id = 6 then 1 end) as intelligenceSSgt")
                ->selectRaw("count(case when stream_id = 3 and rank_id = 7 then 1 end) as intelligenceWO2")
                ->selectRaw("count(case when stream_id = 3 and rank_id = 8 then 1 end) as intelligenceWO1")
                ->selectRaw("count(case when stream_id = 3 then 1 end) as intelligenceTotal")

//            SpecialForces
                ->selectRaw("count(case when stream_id = 4 and rank_id = 2 then 1 end) as sfodPte")
                ->selectRaw("count(case when stream_id = 4 and rank_id = 3 then 1 end) as sfodLCpl")
                ->selectRaw("count(case when stream_id = 4 and rank_id = 4 then 1 end) as sfodCpl")
                ->selectRaw("count(case when stream_id = 4 and rank_id = 5 then 1 end) as sfodSgt")
                ->selectRaw("count(case when stream_id = 4 and rank_id = 6 then 1 end) as sfodSSgt")
                ->selectRaw("count(case when stream_id = 4 and rank_id = 7 then 1 end) as sfodWO2")
                ->selectRaw("count(case when stream_id = 4 and rank_id = 8 then 1 end) as sfodWO1")
                ->selectRaw("count(case when stream_id = 4 then 1 end) as sfodTotal")

//            Provost
                ->selectRaw("count(case when stream_id = 5 and rank_id = 2 then 1 end) as provostPte")
                ->selectRaw("count(case when stream_id = 5 and rank_id = 3 then 1 end) as provostLCpl")
                ->selectRaw("count(case when stream_id = 5 and rank_id = 4 then 1 end) as provostCpl")
                ->selectRaw("count(case when stream_id = 5 and rank_id = 5 then 1 end) as provostSgt")
                ->selectRaw("count(case when stream_id = 5 and rank_id = 6 then 1 end) as provostSSgt")
                ->selectRaw("count(case when stream_id = 5 and rank_id = 7 then 1 end) as provostWO2")
                ->selectRaw("count(case when stream_id = 5 and rank_id = 8 then 1 end) as provostWO1")
                ->selectRaw("count(case when stream_id = 5 then 1 end) as provostTotal")

//            Clerical
                ->selectRaw("count(case when stream_id = 6 and rank_id = 2 then 1 end) as clericalPte")
                ->selectRaw("count(case when stream_id = 6 and rank_id = 3 then 1 end) as clericalLCpl")
                ->selectRaw("count(case when stream_id = 6 and rank_id = 4 then 1 end) as clericalCpl")
                ->selectRaw("count(case when stream_id = 6 and rank_id = 5 then 1 end) as clericalSgt")
                ->selectRaw("count(case when stream_id = 6 and rank_id = 6 then 1 end) as clericalSSgt")
                ->selectRaw("count(case when stream_id = 6 and rank_id = 7 then 1 end) as clericalWO2")
                ->selectRaw("count(case when stream_id = 6 and rank_id = 8 then 1 end) as clericalWO1")
                ->selectRaw("count(case when stream_id = 6 then 1 end) as clericalTotal")

//            Information communications Technology
                ->selectRaw("count(case when stream_id = 7 and rank_id = 2 then 1 end) as ictPte")
                ->selectRaw("count(case when stream_id = 7 and rank_id = 3 then 1 end) as ictLCpl")
                ->selectRaw("count(case when stream_id = 7 and rank_id = 4 then 1 end) as ictCpl")
                ->selectRaw("count(case when stream_id = 7 and rank_id = 5 then 1 end) as ictSgt")
                ->selectRaw("count(case when stream_id = 7 and rank_id = 6 then 1 end) as ictSSgt")
                ->selectRaw("count(case when stream_id = 7 and rank_id = 7 then 1 end) as ictWO2")
                ->selectRaw("count(case when stream_id = 7 and rank_id = 8 then 1 end) as ictWO1")
                ->selectRaw("count(case when stream_id = 7 then 1 end) as ictTotal")

//            Health
                ->selectRaw("count(case when stream_id = 8 and rank_id = 2 then 1 end) as healthPte")
                ->selectRaw("count(case when stream_id = 8 and rank_id = 3 then 1 end) as healthLCpl")
                ->selectRaw("count(case when stream_id = 8 and rank_id = 4 then 1 end) as healthCpl")
                ->selectRaw("count(case when stream_id = 8 and rank_id = 5 then 1 end) as healthSgt")
                ->selectRaw("count(case when stream_id = 8 and rank_id = 6 then 1 end) as healthSSgt")
                ->selectRaw("count(case when stream_id = 8 and rank_id = 7 then 1 end) as healthWO2")
                ->selectRaw("count(case when stream_id = 8 and rank_id = 8 then 1 end) as healthWO1")
                ->selectRaw("count(case when stream_id = 8 then 1 end) as healthTotal")

//            Musical
                ->selectRaw("count(case when stream_id = 9 and rank_id = 2 then 1 end) as musicalPte")
                ->selectRaw("count(case when stream_id = 9 and rank_id = 3 then 1 end) as musicalLCpl")
                ->selectRaw("count(case when stream_id = 9 and rank_id = 4 then 1 end) as musicalCpl")
                ->selectRaw("count(case when stream_id = 9 and rank_id = 5 then 1 end) as musicalSgt")
                ->selectRaw("count(case when stream_id = 9 and rank_id = 6 then 1 end) as musicalSSgt")
                ->selectRaw("count(case when stream_id = 9 and rank_id = 7 then 1 end) as musicalWO2")
                ->selectRaw("count(case when stream_id = 9 and rank_id = 8 then 1 end) as musicalWO1")
                ->selectRaw("count(case when stream_id = 9 then 1 end) as musicalTotal")

//            Supply
                ->selectRaw("count(case when stream_id = 10 and rank_id = 2 then 1 end) as supplyPte")
                ->selectRaw("count(case when stream_id = 10 and rank_id = 3 then 1 end) as supplyLCpl")
                ->selectRaw("count(case when stream_id = 10 and rank_id = 4 then 1 end) as supplyCpl")
                ->selectRaw("count(case when stream_id = 10 and rank_id = 5 then 1 end) as supplySgt")
                ->selectRaw("count(case when stream_id = 10 and rank_id = 6 then 1 end) as supplySSgt")
                ->selectRaw("count(case when stream_id = 10 and rank_id = 7 then 1 end) as supplyWO2")
                ->selectRaw("count(case when stream_id = 10 and rank_id = 8 then 1 end) as supplyWO1")
                ->selectRaw("count(case when stream_id = 10 then 1 end) as supplyTotal")

//           Transport
                ->selectRaw("count(case when stream_id = 11 and rank_id = 2 then 1 end) as transportPte")
                ->selectRaw("count(case when stream_id = 11 and rank_id = 3 then 1 end) as transportLCpl")
                ->selectRaw("count(case when stream_id = 11 and rank_id = 4 then 1 end) as transportCpl")
                ->selectRaw("count(case when stream_id = 11 and rank_id = 5 then 1 end) as transportSgt")
                ->selectRaw("count(case when stream_id = 11 and rank_id = 6 then 1 end) as transportSSgt")
                ->selectRaw("count(case when stream_id = 11 and rank_id = 7 then 1 end) as transportWO2")
                ->selectRaw("count(case when stream_id = 11 and rank_id = 8 then 1 end) as transportWO1")
                ->selectRaw("count(case when stream_id = 11 then 1 end) as transportTotal")

//            Food
                ->selectRaw("count(case when stream_id = 12 and rank_id = 2 then 1 end) as foodPte")
                ->selectRaw("count(case when stream_id = 12 and rank_id = 3 then 1 end) as foodLCpl")
                ->selectRaw("count(case when stream_id = 12 and rank_id = 4 then 1 end) as foodCpl")
                ->selectRaw("count(case when stream_id = 12 and rank_id = 5 then 1 end) as foodSgt")
                ->selectRaw("count(case when stream_id = 12 and rank_id = 6 then 1 end) as foodSSgt")
                ->selectRaw("count(case when stream_id = 12 and rank_id = 7 then 1 end) as foodWO2")
                ->selectRaw("count(case when stream_id = 12 and rank_id = 8 then 1 end) as foodWO1")
                ->selectRaw("count(case when stream_id = 12 then 1 end) as foodTotal")

//            Artisan
                ->selectRaw("count(case when stream_id = 13 and rank_id = 2 then 1 end) as artisanPte")
                ->selectRaw("count(case when stream_id = 13 and rank_id = 3 then 1 end) as artisanLCpl")
                ->selectRaw("count(case when stream_id = 13 and rank_id = 4 then 1 end) as artisanCpl")
                ->selectRaw("count(case when stream_id = 13 and rank_id = 5 then 1 end) as artisanSgt")
                ->selectRaw("count(case when stream_id = 13 and rank_id = 6 then 1 end) as artisanSSgt")
                ->selectRaw("count(case when stream_id = 13 and rank_id = 7 then 1 end) as artisanWO2")
                ->selectRaw("count(case when stream_id = 13 and rank_id = 8 then 1 end) as artisanWO1")
                ->selectRaw("count(case when stream_id = 13 then 1 end) as artisanTotal")

//            Specialist
                ->selectRaw("count(case when stream_id = 14 and rank_id = 2 then 1 end) as specialistPte")
                ->selectRaw("count(case when stream_id = 14 and rank_id = 3 then 1 end) as specialistLCpl")
                ->selectRaw("count(case when stream_id = 14 and rank_id = 4 then 1 end) as specialistCpl")
                ->selectRaw("count(case when stream_id = 14 and rank_id = 5 then 1 end) as specialistSgt")
                ->selectRaw("count(case when stream_id = 14 and rank_id = 6 then 1 end) as specialistSSgt")
                ->selectRaw("count(case when stream_id = 14 and rank_id = 7 then 1 end) as specialistWO2")
                ->selectRaw("count(case when stream_id = 14 and rank_id = 8 then 1 end) as specialistWO1")
                ->selectRaw("count(case when stream_id = 14 then 1 end) as specialistTotal")

//            Technician

                ->selectRaw("count(case when stream_id = 15 and rank_id = 2 then 1 end) as technicalPte")
                ->selectRaw("count(case when stream_id = 15 and rank_id = 3 then 1 end) as technicalLCpl")
                ->selectRaw("count(case when stream_id = 15 and rank_id = 4 then 1 end) as technicalCpl")
                ->selectRaw("count(case when stream_id = 15 and rank_id = 5 then 1 end) as technicalSgt")
                ->selectRaw("count(case when stream_id = 15 and rank_id = 6 then 1 end) as technicalSSgt")
                ->selectRaw("count(case when stream_id = 15 and rank_id = 7 then 1 end) as technicalWO2")
                ->selectRaw("count(case when stream_id = 15 and rank_id = 8 then 1 end) as technicalWO1")
                ->selectRaw("count(case when stream_id = 15 then 1 end) as technicianTotal")
//            Total
                ->selectRaw("count(*) as total")
                ->first();
    }
}
