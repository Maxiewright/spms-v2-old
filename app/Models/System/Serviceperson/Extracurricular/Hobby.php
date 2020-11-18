<?php

namespace App\Models\System\Serviceperson\Extracurricular;


use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\ServicepersonHobby;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $fillable = ['hobby_type_id','name'];

    public function serviceperson(){
        return $this->belongsToMany(Serviceperson::class, 'serviceperson_hobby')
            ->using(ServicepersonHobby::class)
            ->as('details')
            ->withTimestamps()
            ->orderBy('pivot_created_at', 'DESC');
    }

    public function type()
    {
        return $this->belongsTo(HobbyType::class, 'hobby_type_id');
    }
}
