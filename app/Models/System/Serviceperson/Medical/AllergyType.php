<?php

namespace App\Models\System\Serviceperson\Medical;

use Illuminate\Database\Eloquent\Model;

class AllergyType extends Model
{
    protected $fillable = ['type'];

    public function allergy()
    {
        return $this->hasOne(Allergy::class);
    }
}
