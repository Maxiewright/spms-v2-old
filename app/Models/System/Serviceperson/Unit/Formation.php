<?php

namespace App\Models\System\Serviceperson\Unit;

use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    Use HasFactory;

    protected $fillable = [
        'name', 'long_name', 'slug'
    ];

    public function serviceperson()
    {
        return $this->hasMany(Serviceperson::class);
    }

}
