<?php

namespace App\Models\System\Serviceperson\Biodata;

use App\Models\Serviceperson\Biodata;
use Illuminate\Database\Eloquent\Model;

class SkinColour extends Model
{
    protected $fillable = ['name'];

    public function biodata()
    {
        return $this->hasOne(Biodata::class);
    }
}
