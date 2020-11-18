<?php

namespace App\Models\Serviceperson;

use App\Models\System\Universal\Lookup\EmailType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailAddress extends Model
{
    Use HasFactory;

    protected $fillable = ['email'];

    public function serviceperson(){
        return $this->morphedByMany(Serviceperson::class, 'email_addressable')
            ->withPivot('email_type_id')
            ->withTimestamps();
    }

    public function emergencyContact()
    {
        return $this->morphedByMany(EmergencyContact::class, 'email_addressable')
            ->withPivot('email_type_id')
            ->withTimestamps();
    }


}
