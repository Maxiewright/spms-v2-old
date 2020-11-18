<?php

namespace App\Models\System\Serviceperson\Biodata;

use App\Models\Serviceperson\Biodata;
use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    protected $fillable = ['name', 'slug'];

    public function biodata()
    {
        return $this->hasOne(Biodata::class);
    }
}
