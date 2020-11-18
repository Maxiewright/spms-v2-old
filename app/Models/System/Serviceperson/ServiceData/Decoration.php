<?php

namespace App\Models\System\Serviceperson\ServiceData;


use App\Models\Serviceperson\Award;
use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Model;

class Decoration extends Model
{

    protected $fillable = ['decoration','slug'];

    public function serviceperson(){
        return $this->belongsToMany(Serviceperson::class, 'serviceperson_decoration')
            ->using(Award::class)
            ->withPivot('received_on')
            ->as('details')
            ->orderBy('pivot_received_on', 'DESC')
            ->withTimestamps();
    }

}
