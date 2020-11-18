<?php

namespace App\Models\Serviceperson;

use App\Models\System\Serviceperson\Address\CityOrTown;
use Database\Factories\Serviceperson\AddressFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Address extends Model
{
    use  HasFactory, SoftDeletes;

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return AddressFactory::new();
    }

    protected $fillable = [
        'address1',
        'address2',
        'city_or_town_id',
    ];

    public function serviceperson(){
        return $this->morphedByMany(Serviceperson::class, 'addressable');
    }

    public function cityOrTown(){
        return $this->belongsTo(CityOrTown::class);
    }

    public function dependent(){
        return $this->morphedByMany(Dependent::class, 'addressable');
    }

    public function emergencyContact()
    {
        return $this->morphedByMany(EmergencyContact::class, 'addressable');
    }


    public function getFullAddressAttribute()
    {
        if($this->address2){
            return $this->address1 .', '. $this->address2 .', '. $this->cityOrTown->name;
        }
        return $this->address1 .', '. $this->cityOrTown->name;
    }

}
