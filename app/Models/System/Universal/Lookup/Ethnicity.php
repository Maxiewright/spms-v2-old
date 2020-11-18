<?php

namespace App\Models\System\Universal\Lookup;

use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Model;

class Ethnicity extends Model
{
    public $fillable = ['name'];

    public function serviceperson()
    {
        return $this->hasOne(Serviceperson::class);
    }
}
