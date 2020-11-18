<?php

namespace App\Models\System\Serviceperson\LookUp;

use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Model;

class ServicepersonStatus extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    public function serviceperson() {
        return $this->hasMany(Serviceperson::class);
    }
}
