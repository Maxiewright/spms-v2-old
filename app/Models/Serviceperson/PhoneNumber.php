<?php

namespace App\Models\Serviceperson;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PhoneNumber extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['number'];

    public function dependent(){
        return $this->belongsToMany(Dependent::class)
            ->withPivot('phone_number_type_id')
            ->withTimestamps();
    }

    public function serviceperson(){
        return $this->morphedByMany(Serviceperson::class, 'phone_numberable')
            ->withPivot('phone_type_id')
            ->withTimestamps();
    }

    public function emergencyContact()
    {
        return $this->morphedByMany(EmergencyContact::class, 'phone_numberable')
            ->withPivot('phone_type_id')
            ->withTimestamps();
    }
    /**
     * Sanitise Phone Numbers entered into the DB
    */

    public function setNumberAttribute($value)
    {
        $this->attributes['number'] = preg_replace("/[^0-9]/","", $value);
    }

    /**
     * Return Formatted Phone Number
     *
     * @return string
     */

    public function getFormattedNumberAttribute()
    {
        //Remove all non-numbers if any.
        $phone = preg_replace("/[^0-9]/","",$this->number);
        return substr($phone ,0,3)."-".substr($phone ,3,4);
    }

    public function phone($type)
    {
        return $this->phoneNumber()->where('phone_type_id', '=', $type)->pluck('number')->first();
    }



}
