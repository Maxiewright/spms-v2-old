<?php

namespace App\Models\Serviceperson;


use App\Models\Serviceperson\PhoneNumber;
use App\Models\System\Universal\Lookup\Gender;
use App\Models\System\Universal\Lookup\Relationship;
use App\Models\System\Universal\Lookup\Religion;
use App\Models\System\Universal\Polymorphic\Photo;
use App\Traits\MustBeApproved;
use Approval\Traits\RequiresApproval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;


class Dependent extends Model
{
    use  HasFactory, SoftDeletes, MustBeApproved;

    protected $primaryKey = 'pin';
    public $incrementing = false;

    protected $fillable = [
        'pin', 'first_name', 'last_name', 'other_names', 'relationship_id',
        'gender_id', 'religion_id', 'date_of_birth', 'is_next_of_kin',
    ];

    protected $dates = ['date_of_birth',];

    public function getModificationDetailsAttribute()
    {
        try {
            return $this->modificationDetails([
                'pin' => $this->modificationAttribute('pin'),
                'first name' => $this->modificationAttribute('first_name'),
                'last name' => $this->modificationAttribute('last_name'),
                'other name' => $this->modificationAttribute('other_names'),
                'relationship' => $this->modificationAttribute('relationship_id', 'relationship'),
                'gender' => $this->modificationAttribute('gender_id', 'gender'),
                'religion' => $this->modificationAttribute('religion_id', 'religion'),
                'data of birth' => $this->modificationAttribute('date_of_birth', null, 'date'),
                'next of kin' => $this->modificationAttribute('is_next_of_kin'),
            ]);
        } catch (\Exception $e) {
        }
    }

    public function serviceperson()
    {
        return $this->belongsToMany(Serviceperson::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function relationship()
    {
        return $this->belongsTo(Relationship::class);
    }

    /**
     * Dependent Image
     */

    public function photo()
    {
        return $this->morphOne(Photo::class, 'imageable');
    }

//    public function getImageAttribute()
//    {
//        return Storage::url( 'dependents/'.$this->photo->path);
//    }


    public function address()
    {
        return $this->morphToMany(Address::class, 'addressable');
    }

    public function emailAddress()
    {
        return $this->morphToMany(EmailAddress::class, 'email_addressable')->withPivot('email_type_id')->withTimestamps();
    }

    public function phoneNumber()
    {
        return $this->morphToMany(PhoneNumber::class, 'phone_numberable')->withPivot('phone_type_id')->withTimestamps();
    }


}
