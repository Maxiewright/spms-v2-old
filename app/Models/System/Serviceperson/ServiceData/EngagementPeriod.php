<?php

namespace App\Models\System\Serviceperson\ServiceData;

use App\Models\Serviceperson\Enlistment;
use Illuminate\Database\Eloquent\Model;

class EngagementPeriod extends Model
{
    protected $fillable = ['name', 'slug'];

    public function enlistment()
    {
        return $this->hasOne(Enlistment::class);
    }
}
