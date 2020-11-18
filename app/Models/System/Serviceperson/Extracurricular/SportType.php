<?php

namespace App\Models\System\Serviceperson\Extracurricular;

use Illuminate\Database\Eloquent\Model;

class SportType extends Model
{
    protected $fillable = ['name'];

    public function sports()
    {
        return $this->hasMany(Sport::class);
    }
}
