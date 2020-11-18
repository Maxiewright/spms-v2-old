<?php


namespace App\Traits;

use Carbon\Carbon;

trait HasSOSDate
{

    public function SOSDate()
    {
        $rank = $this->promotions()->orderBy('promoted_on', 'desc')->pluck('rank_id')->first();
        // Get SOS age based on rank;
        $SOSage = '';
        if($rank <= 4 ){
            $SOSage = 45;
        } else if ($rank >= 5 && $rank <= 6 || $rank >=9 && $rank <=13){
            $SOSage = 47;
        } else if ($rank >= 7 && $rank <= 8 || $rank == 14 ) {
            $SOSage = 50;
        } else if ($rank >= 15){
            $SOSage = 55;
        }
//        Return SOS Date
        return  (new Carbon($this->nationalIdCard->date_of_birth))->addYears($SOSage);
    }

    public function terminalLeaveDate()
    {
        return $this->SOSDate()->subDays(28);
    }

}
