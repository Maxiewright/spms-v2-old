<?php

namespace App\Models\Serviceperson;


use App\Models\System\Universal\Lookup\Gender;
use App\Models\System\Universal\Lookup\Relationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EmergencyContact extends Model
{

    protected $fillable = [
        'serviceperson_number',  'first_name', 'middle_name'
        ,'last_name' , 'gender_id', 'relationship_id','employer', 'is_primary'
    ];

    /**
     * Scope for primary contacts
     * @param $query
     * @return mixed
     */
    public function scopePrimary($query)
    {
        return $query->where('is_primary', true);
    }

    /**
     * Scope for secondary contacts
     *
     * @param $query
     * @return mixed
     */
    public function scopeSecondary($query)
    {
        return $query->where('is_primary', false);
    }

    public function serviceperson()
    {
        return $this->belongsTo(Serviceperson::class);
    }

    public function relationship()
    {
        return $this->belongsTo(Relationship::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    /**
     * Contact
     */

    public function addresses()
    {
        return $this->morphToMany(Address::class, 'addressable');
    }

    public function getAddressAttribute()
    {
        return $this->Addresses->first();
    }

    public function emailAddresses()
    {
        return $this->morphToMany(EmailAddress::class, 'email_addressable')->withPivot('email_type_id')->withTimestamps();
    }

    public function getEmailTypeAttribute()
    {
        return $this->emailAddresses->first()->pivot->email_type_id;
    }

    public function getEmailAttribute()
    {
        return $this->emailAddresses->first()->email;
    }

    public function phoneNumbers()
    {
        return $this->morphToMany(PhoneNumber::class, 'phone_numberable')->withPivot('phone_type_id')->withTimestamps();
    }
    public function getPhoneTypeAttribute()
    {
        return $this->phoneNumbers->first()->pivot->phone_type_id;
    }

    public function getPhoneAttribute()
    {
        return $this->phoneNumbers->first()->number;
    }

}
