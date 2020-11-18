<?php

namespace App\Models\System\Serviceperson\ServiceData;

use App\Models\Serviceperson\ReEngagement;
use Illuminate\Database\Eloquent\Model;

class ReEngagementPeriod extends Model
{
    protected $fillable = ['name', 'number'];

    public function reEngagement()
    {
        return $this->hasOne(ReEngagement::class);
    }
}
