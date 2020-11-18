<?php

namespace App\Models\System\Universal\Lookup;


use App\Models\Serviceperson\Dependent;
use App\Models\Serviceperson\NationalIdCard;
use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public $fillable = ['name'];

    public function serviceperson(){
        return $this->hasOne(Serviceperson::class);
    }

    public function dependent(){
        return $this->hasOne(Dependent::class);
    }

    public function nationalIdCard()
    {
        return $this->hasMany(NationalIdCard::class);
    }
}
