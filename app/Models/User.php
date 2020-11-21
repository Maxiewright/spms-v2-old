<?php

namespace App\Models;

use App\Models\Serviceperson\Serviceperson;
use Approval\Traits\ApprovesChanges;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use HasPermissions;
    use Notifiable;
    use ApprovesChanges;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'serviceperson_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password_changed_at' => 'datetime'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Returns a belongs to relationship with the Serviceperson Model
     *
     * @return BelongsTo
     */

    public function serviceperson(){
        return $this->belongsTo(Serviceperson::class);
    }


    /**
     * Check to see if the Serviceperson has a given model in a belongs to many or many to many relationship
     *
     * @param $collection
     * @param $model
     * @return mixed
     */
    public function hasModel($collection, $model)
    {
        return $this->serviceperson->{$collection}->contains($model);
    }

    /**
     * Gets the Service Name of the User
     *
     * @return mixed
     */
    public function getNameAttribute()
    {
        return $this->serviceperson->name;
    }

    public function passwordChanged(){
        return  $this->password_change_at
            ? true
            : false ;
    }
}
