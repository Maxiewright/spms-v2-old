<?php

namespace App\Models\System\Serviceperson\LookUp;

use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Model;

class SOSReasons extends Model
{
    protected $table = 'sos_reasons';

    protected $fillable = [
        'name',
        'slug'
    ];

    public function serviceperson() {
        return $this->hasOne(Serviceperson::class);
    }
}
