<?php

namespace App\Models\System\Serviceperson\ServiceData;

use App\Models\Serviceperson\Promotion;
use App\Models\Serviceperson\Serviceperson;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Branch;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\BranchEstablishment;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPath;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPathEstablishment;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Stream;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\StreamEstablishment;
use App\Models\System\Serviceperson\CareerManagement\Job\Job;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    public $fillable = [
        'grade',
        'regiment',
        'regiment_slug',
        'coast_guard',
        'coast_guard_slug',
        'air_guard',
        'air_guard_slug'
    ];


    public function serviceperson(){
        return $this->belongsToMany(Serviceperson::class, 'promotions')
            ->using(Promotion::class)
            ->withPivot('promoted_on', 'substantive_on')
            ->as('details')
            ->orderBy('pivot_promoted_on', 'DESC')
            ->withTimestamps();
    }

    public function branch()
    {
        return $this->belongsToMany(Branch::class, 'branch_establishment')
            ->using(BranchEstablishment::class)
            ->withPivot('establishment')
          ;
    }

    public function stream()
    {
        return $this->belongsToMany(Stream::class, 'stream_establishment')
            ->using(StreamEstablishment::class)
            ->withPivot('establishment')
            ->withTimestamps();
    }

    public function careerPath()
    {
        return $this->belongsToMany(CareerPath::class, 'career_path_establishment')
            ->using(CareerPathEstablishment::class)
            ->withTimestamps();
    }

    public function job()
    {
        return $this->belongsToMany(Job::class);
    }




}
