<?php

namespace App\Models\Serviceperson;

use App\Models\System\Serviceperson\Extracurricular\Hobby;
use Illuminate\Database\Eloquent\Relations\Pivot;


class ServicepersonHobby extends Pivot
{

    protected $table = ['serviceperson_hobby'];

    protected $fillable = ['hobby_id', 'serviceperson_number'];

    public function serviceperson()
    {
        return $this->belongsTo(Serviceperson::class);
    }

    public function sport()
    {
        return $this->belongsTo(Hobby::class);
    }
}
