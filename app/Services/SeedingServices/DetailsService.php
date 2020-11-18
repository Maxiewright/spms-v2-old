<?php


namespace App\Services\SeedingServices;

use App\Services\ServicepersonServices\RetirementService;

class DetailsService
{
    public static function details($serviceperson, $nationalId)
    {

        $currentRankId = $serviceperson->lastPromotion->rank_id;

        $serviceperson->update([
            'rank_id' => $currentRankId,
            'unit_id' => $serviceperson->currentUnit->id,
            'job_id' =>  $serviceperson->currentJob->job->id,
            'career_path_id' => $serviceperson->currentJob->job->careerPath->id,
            'stream_id' => $serviceperson->currentJob->job->careerPath->stream->id,
            'branch_id' => $serviceperson->currentJob->job->careerPath->stream->branch->id,
            're_engagement_date' => $serviceperson->lastEnlistment->contract_end ?? null,
            'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
        ]);
    }
}
