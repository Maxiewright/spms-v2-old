<?php

namespace App\Models\Authentication;

use App\Models\Serviceperson\Serviceperson;
use Approval\Models\Modification;
use Approval\Traits\ApprovesChanges;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements MustVerifyEmail
{
    use  TwoFactorAuthenticatable, HasRoles, HasPermissions, HasFactory, Notifiable, ApprovesChanges;

    protected function authorizedToApprove(Modification $modification): bool
    {
        if ($this->can('view-pending-serviceperson')){
            return true;
        };

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'username', 'email', 'serviceperson_number','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
