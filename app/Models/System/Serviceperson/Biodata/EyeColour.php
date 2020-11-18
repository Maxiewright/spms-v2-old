<?php

namespace App\Models\System\Serviceperson\Biodata;


use App\Models\Serviceperson\Biodata;
use Illuminate\Database\Eloquent\Model;

class EyeColour extends Model
{
    protected $fillable = ['name'];

    public function biodata()
    {
        $this->hasOne(Biodata::class);
    }
}
