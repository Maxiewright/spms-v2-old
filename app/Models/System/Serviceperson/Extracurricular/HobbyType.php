<?php

namespace App\Models\System\Serviceperson\Extracurricular;

use Illuminate\Database\Eloquent\Model;

class HobbyType extends Model
{
    protected $fillable = ['name'];

    public function hobbies()
    {
        return $this->hasMany(Hobby::class);
    }
}
