<?php


namespace App\Services\CareerManagementServices;


use App\Models\Serviceperson\Serviceperson;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\BranchEstablishment;
use Illuminate\Support\Facades\DB;

class BranchService
{
    /**
     * Get current Current Branch Strength By Rank.
     * @return mixed
     */
    public static function strength()
    {
       return Serviceperson::query()->enlisted()
//            Operations
            ->selectRaw("sum(CASE WHEN branch_id = 1 and rank_id = 2 THEN 1 END) as opsPte")
            ->selectRaw("sum(CASE WHEN branch_id = 1 and rank_id = 3 THEN 1 END) as opsLCpl")
            ->selectRaw("sum(CASE WHEN branch_id = 1 and rank_id = 4 THEN 1 END) as opsCpl")
            ->selectRaw("sum(CASE WHEN branch_id = 1 and rank_id = 5 THEN 1 END) as opsSgt")
            ->selectRaw("sum(CASE WHEN branch_id = 1 and rank_id = 6 THEN 1 END) as opsSSgt")
            ->selectRaw("sum(CASE WHEN branch_id = 1 and rank_id = 7 THEN 1 END) as opsWO2")
            ->selectRaw("sum(CASE WHEN branch_id = 1 and rank_id = 8 THEN 1 END) as opsWO1")
            ->selectRaw("sum(CASE WHEN branch_id = 1 THEN 1 END) as opsTotal")

//            Administration
            ->selectRaw("sum(CASE WHEN branch_id = 2 and rank_id = 2 THEN 1 END) as adminPte")
            ->selectRaw("sum(CASE WHEN branch_id = 2 and rank_id = 3 THEN 1 END) as adminLCpl")
            ->selectRaw("sum(CASE WHEN branch_id = 2 and rank_id = 4 THEN 1 END) as adminCpl")
            ->selectRaw("sum(CASE WHEN branch_id = 2 and rank_id = 5 THEN 1 END) as adminSgt")
            ->selectRaw("sum(CASE WHEN branch_id = 2 and rank_id = 6 THEN 1 END) as adminSSgt")
            ->selectRaw("sum(CASE WHEN branch_id = 2 and rank_id = 7 THEN 1 END) as adminWO2")
            ->selectRaw("sum(CASE WHEN branch_id = 2 and rank_id = 8 THEN 1 END) as adminWO1")
            ->selectRaw("sum(CASE WHEN branch_id = 2 THEN 1 END) as adminTotal")
//            Logistics
            ->selectRaw("sum(CASE WHEN branch_id = 3 and rank_id = 2 THEN 1 END) as logsPte")
            ->selectRaw("sum(CASE WHEN branch_id = 3 and rank_id = 3 THEN 1 END) as logsLCpl")
            ->selectRaw("sum(CASE WHEN branch_id = 3 and rank_id = 4 THEN 1 END) as logsCpl")
            ->selectRaw("sum(CASE WHEN branch_id = 3 and rank_id = 5 THEN 1 END) as logsSgt")
            ->selectRaw("sum(CASE WHEN branch_id = 3 and rank_id = 6 THEN 1 END) as logsSSgt")
            ->selectRaw("sum(CASE WHEN branch_id = 3 and rank_id = 7 THEN 1 END) as logsWO2")
            ->selectRaw("sum(CASE WHEN branch_id = 3 and rank_id = 8 THEN 1 END) as logsWO1")
            ->selectRaw("sum(CASE WHEN branch_id = 3 THEN 1 END) as logsTotal")
//            Engineers
            ->selectRaw("sum(CASE WHEN branch_id = 4 and rank_id = 2 THEN 1 END) as engrPte")
            ->selectRaw("sum(CASE WHEN branch_id = 4 and rank_id = 3 THEN 1 END) as engrLCpl")
            ->selectRaw("sum(CASE WHEN branch_id = 4 and rank_id = 4 THEN 1 END) as engrCpl")
            ->selectRaw("sum(CASE WHEN branch_id = 4 and rank_id = 5 THEN 1 END) as engrSgt")
            ->selectRaw("sum(CASE WHEN branch_id = 4 and rank_id = 6 THEN 1 END) as engrSSgt")
            ->selectRaw("sum(CASE WHEN branch_id = 4 and rank_id = 7 THEN 1 END) as engrWO2")
            ->selectRaw("sum(CASE WHEN branch_id = 4 and rank_id = 8 THEN 1 END) as engrWO1")
            ->selectRaw("sum(CASE WHEN branch_id = 4 THEN 1 END) as engrTotal")
//            Totals
            ->selectRaw("sum(CASE WHEN rank_id = 2 THEN 1 END) as Pte")
            ->selectRaw("sum(CASE WHEN rank_id = 3 THEN 1 END) as LCpl")
            ->selectRaw("sum(CASE WHEN rank_id = 4 THEN 1 END) as Cpl")
            ->selectRaw("sum(CASE WHEN rank_id = 5 THEN 1 END) as Sgt")
            ->selectRaw("sum(CASE WHEN rank_id = 6 THEN 1 END) as SSgt")
            ->selectRaw("sum(CASE WHEN rank_id = 7 THEN 1 END) as WO2")
            ->selectRaw("sum(CASE WHEN rank_id = 8 THEN 1 END) as WO1")
            ->selectRaw("count(*) as total")
            ->first();
    }

    /**
     * Return the branch establishment
     * @return mixed
     */
    public static function establishment()
    {
        return BranchEstablishment::query()
//            Operations
            ->selectRaw("sum(CASE WHEN branch_id = 1 and rank_id = 2 THEN establishment ELSE 0 END) as opsPte")
            ->selectRaw("sum(CASE WHEN branch_id = 1 and rank_id = 3 THEN establishment ELSE 0 END) as opsLCpl")
            ->selectRaw("sum(CASE WHEN branch_id = 1 and rank_id = 4 THEN establishment ELSE 0 END) as opsCpl")
            ->selectRaw("sum(CASE WHEN branch_id = 1 and rank_id = 5 THEN establishment ELSE 0 END) as opsSgt")
            ->selectRaw("sum(CASE WHEN branch_id = 1 and rank_id = 6 THEN establishment ELSE 0 END) as opsSSgt")
            ->selectRaw("sum(CASE WHEN branch_id = 1 and rank_id = 7 THEN establishment ELSE 0 END) as opsWO2")
            ->selectRaw("sum(CASE WHEN branch_id = 1 and rank_id = 8 THEN establishment ELSE 0 END) as opsWO1")
            ->selectRaw("sum(CASE WHEN branch_id = 1 THEN establishment ELSE 0 END) as opsTotal")

//            Administration
            ->selectRaw("sum(CASE WHEN branch_id = 2 and rank_id = 2 THEN establishment ELSE 0 END) as adminPte")
            ->selectRaw("sum(CASE WHEN branch_id = 2 and rank_id = 3 THEN establishment ELSE 0 END) as adminLCpl")
            ->selectRaw("sum(CASE WHEN branch_id = 2 and rank_id = 4 THEN establishment ELSE 0 END) as adminCpl")
            ->selectRaw("sum(CASE WHEN branch_id = 2 and rank_id = 5 THEN establishment ELSE 0 END) as adminSgt")
            ->selectRaw("sum(CASE WHEN branch_id = 2 and rank_id = 6 THEN establishment ELSE 0 END) as adminSSgt")
            ->selectRaw("sum(CASE WHEN branch_id = 2 and rank_id = 7 THEN establishment ELSE 0 END) as adminWO2")
            ->selectRaw("sum(CASE WHEN branch_id = 2 and rank_id = 8 THEN establishment ELSE 0 END) as adminWO1")
            ->selectRaw("sum(CASE WHEN branch_id = 2 THEN establishment ELSE 0 END) as adminTotal")
//            Logistics
            ->selectRaw("sum(CASE WHEN branch_id = 3 and rank_id = 2 THEN establishment ELSE 0 END) as logsPte")
            ->selectRaw("sum(CASE WHEN branch_id = 3 and rank_id = 3 THEN establishment ELSE 0 END) as logsLCpl")
            ->selectRaw("sum(CASE WHEN branch_id = 3 and rank_id = 4 THEN establishment ELSE 0 END) as logsCpl")
            ->selectRaw("sum(CASE WHEN branch_id = 3 and rank_id = 5 THEN establishment ELSE 0 END) as logsSgt")
            ->selectRaw("sum(CASE WHEN branch_id = 3 and rank_id = 6 THEN establishment ELSE 0 END) as logsSSgt")
            ->selectRaw("sum(CASE WHEN branch_id = 3 and rank_id = 7 THEN establishment ELSE 0 END) as logsWO2")
            ->selectRaw("sum(CASE WHEN branch_id = 3 and rank_id = 8 THEN establishment ELSE 0 END) as logsWO1")
            ->selectRaw("sum(CASE WHEN branch_id = 3 THEN establishment ELSE 0 END) as logsTotal")
//            Engineers
            ->selectRaw("sum(CASE WHEN branch_id = 4 and rank_id = 2 THEN establishment ELSE 0 END) as engrPte")
            ->selectRaw("sum(CASE WHEN branch_id = 4 and rank_id = 3 THEN establishment ELSE 0 END) as engrLCpl")
            ->selectRaw("sum(CASE WHEN branch_id = 4 and rank_id = 4 THEN establishment ELSE 0 END) as engrCpl")
            ->selectRaw("sum(CASE WHEN branch_id = 4 and rank_id = 5 THEN establishment ELSE 0 END) as engrSgt")
            ->selectRaw("sum(CASE WHEN branch_id = 4 and rank_id = 6 THEN establishment ELSE 0 END) as engrSSgt")
            ->selectRaw("sum(CASE WHEN branch_id = 4 and rank_id = 7 THEN establishment ELSE 0 END) as engrWO2")
            ->selectRaw("sum(CASE WHEN branch_id = 4 and rank_id = 8 THEN establishment ELSE 0 END) as engrWO1")
            ->selectRaw("sum(CASE WHEN branch_id = 4 THEN establishment ELSE 0 END) as engrTotal")
//            Totals
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
}
