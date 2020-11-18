<?php

namespace App\Models\Serviceperson;

use App\Models\Authentication\User;
use App\Models\System\Serviceperson\Extracurricular\Hobby;
use App\Models\System\Serviceperson\Extracurricular\Sport;
use App\Models\System\Serviceperson\LookUp\ServicepersonStatus;
use App\Models\System\Universal\Lookup\Ethnicity;
use App\Models\System\Universal\Lookup\MaritalStatus;
use App\Models\System\Universal\Lookup\Religion;
use App\Models\System\Universal\Polymorphic\Photo;
use App\Services\ServicepersonServices\RetirementService;
use App\Traits\MustBeApproved;
use App\Traits\Serviceperson\HasIdentification;
use App\Traits\Serviceperson\HasMedicalData;
use App\Traits\Serviceperson\HasQualification;
use App\Traits\Serviceperson\HasServiceData;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Modules\Leave\Traits\HasLeave;
use OwenIt\Auditing\Contracts\Auditable;

class Serviceperson extends Model implements Auditable
{
    use HasFactory, MustBeApproved, \OwenIt\Auditing\Auditable, HasEvents, HasIdentification,
        HasQualification, HasServiceData, HasMedicalData;

    protected $primaryKey = 'number';

    public $incrementing = false;

    protected $fillable = [
        'formation_id',
        'number', 'rank_id', 'first_name', 'middle_name', 'last_name', 'other_names',
        'ethnicity_id', 'marital_status_id', 'religion_id', 'serviceperson_status_id',
        'unit_id', 'job_id', 'career_path_id', 'stream_id', 'branch_id',
        're_engagement_date', 'crod', 'sos_reason_id', 'sos_on',
    ];

    protected $dates = ['sos_on', 'crod','approval_at', 're_engagement_date'];

    /**
     * Return details of modification and creation
     *
     * @return Collection
     * @throws Exception
     */

    public function getModificationDetailsAttribute()
    {
        return $this->modificationDetails([
            'number' => $this->modificationAttribute('number'),
            'first name' => $this->modificationAttribute('first_name'),
            'middle name' => $this->modificationAttribute('middle_name'),
            'last name' => $this->modificationAttribute('last_name'),
            'other names' => $this->modificationAttribute('other_names'),
            'marital status' => $this->modificationAttribute('marital_status_id', 'maritalStatus'),
            'ethnicity' => $this->modificationAttribute('ethnicity_id', 'ethnicity'),
            'religion' => $this->modificationAttribute('religion_id', 'religion'),
        ]);
    }

    /** ******************************************* Scopes ************************************************************/

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {

        // Serviceperson who have struck of strength (retired) will not be shown.
        static::addGlobalScope('sos', function (Builder $builder) {
            $builder->where('sos_on', '=', null);
        });

    }

    /** *********************************************** System  Access ************************************************/
    /**
     * linked to User model for system access
     * @return HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /** ************************************************** Basic Info ************************************************/
    /**
     * Serviceperson Image
     */
    public function photo()
    {
        return $this->morphOne(Photo::class, 'imageable');
    }

    public function getImageAttribute()
    {
        if (isset($this->photo->path)) {
            return Storage::url('servicepeople/' . $this->photo->path);
        } else {
            return 'No Image Found!';
        }

    }

    /**
     * Retrieve service name with abbreviated rank e.g 12345 Pte Snooks J
     */

    public function getNameAttribute()
    {
        if ($this->rank_id <= 6) {
            return
                ($this->middle_name != null)
                    ? $this->number . ' ' . $this->current_rank_slug . ' ' . $this->last_name . '. ' . substr($this->middle_name, 0, 1) . '. ' . substr($this->first_name, 0, 1)
                    : $this->number . ' ' . $this->current_rank_slug . ' ' . $this->last_name . '. ' . substr($this->first_name, 0, 1);
        } elseif ($this->rank_id >= 7) {
            return
                ($this->middle_name != null)
                    ? $this->number . ' ' . $this->current_rank_slug . ' ' . substr($this->first_name, 0, 1) . '. ' . substr($this->middle_name, 0, 1) . '. ' . $this->last_name
                    : $this->number . ' ' . $this->current_rank_slug . ' ' . substr($this->first_name, 0, 1) . '. ' . $this->last_name;
        }
    }

    public function getShortNameAttribute()
    {
        return $this->current_rank_slug . ' ' . $this->last_name;
    }


    public function getRetirementDateAttribute()
    {
        return RetirementService::getRetirementDate(
            $this->lastPromotion->rank_id,
            $this->nationalIdCard->date_of_birth
        );
    }

    /**
     * Get serviceperson status
     */

    public function status()
    {
        return $this->belongsTo(ServicepersonStatus::class, 'serviceperson_status_id');
    }

    public function getCurrentStatusAttribute()
    {
        return $this->status->slug;
    }



    /**
     * Serviceperson Religion
     * @return BelongsTo
     */
    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    /**
     * Serviceperson Marital Status
     * @return BelongsTo
     */
    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class);
    }

    /**
     * Serviceperson Ethnicity
     * @return BelongsTo
     */
    public function ethnicity()
    {
        return $this->belongsTo(Ethnicity::class);
    }

    /** ************************************************ Contact ******************************************************/

    /**
     * Serviceperson Address
     * @return MorphToMany
     */

    public function addresses()
    {
        return $this->morphToMany(Address::class, 'addressable');
    }


    public function emailAddresses()
    {
        return $this->morphToMany(EmailAddress::class, 'email_addressable')->withPivot('email_type_id')->withTimestamps();
    }

    public function phoneNumbers()
    {
        return $this->morphToMany(PhoneNumber::class, 'phone_numberable')->withPivot('phone_type_id')->withTimestamps();
    }


    /**
     * Extracurricular
     */

    public function hobbies()
    {
        return $this->belongsToMany(Hobby::class, 'serviceperson_hobby')
            ->using(ServicepersonHobby::class)
            ->as('details')
            ->withTimestamps()
            ->orderBy('pivot_created_at', 'DESC');
    }

    public function sports()
    {
        return $this->belongsToMany(Sport::class, 'serviceperson_sport')
            ->using(ServicepersonSport::class)
            ->as('details')
            ->withTimestamps()
            ->orderBy('pivot_created_at', 'DESC');
    }

    /**
     * Dependents
     */

    public function dependents()
    {
        return $this->belongsToMany(Dependent::class, 'dependent_serviceperson');
    }

    /**
     * Emergency Contact
     */

    public function emergencyContacts()
    {
        return $this->hasMany(EmergencyContact::class);
    }

    public function getRecordAttribute()
    {
        if ($this->number == session('serviceNumber')) {
            return $this;
        }
    }

}
