<?php

namespace App\Models\Serviceperson;


use App\Models\System\Serviceperson\DriversPermit\DriversPermitClass;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitTransactionCode;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DriversPermit extends Model
{
   use  HasFactory;

    protected $primaryKey = 'number';
    public $incrementing = false;

    protected $fillable = [
        'number',
        'serviceperson_number',
        'drivers_permit_type_id',
        'drivers_permit_class_id',
        'drivers_permit_transaction_code_id',
        'issued_on',
        'expired_on',
    ];

    protected $dates = ['issued_on', 'expired_on'];

    public function serviceperson(){
        return $this->belongsTo(Serviceperson::class);
    }

    public function driversPermitType()
    {
        return $this->belongsTo(DriversPermitType::class);
    }

    public function driversPermitClass()
    {
        return $this->belongsTo(DriversPermitClass::class);
    }

    public function driversPermitTransactionCode()
    {
        return $this->belongsTo(DriversPermitTransactionCode::class);
    }

    public function getStatementAttribute()
    {
        ($this->serviceperson->nationalIdCard->gender_id == 1)
            ? $pronoun = 'His '
            : $pronoun = 'Her ';

        ($this->expired_on->isBefore(now()))
            ? $response = $this->driversPermitType->name . ' Drivers Permit is invalid. It expired '.$this->expired_on
                ->endOfDay()
                ->diffForHumans()
            : $response = $this->driversPermitType->name . ' Drivers Permit is valid. It Will expire '.$this->expired_on
                ->endOfDay()
                ->diffForHumans();

        return auth()->user()->serviceperson->number === $this->serviceperson->number
            ? 'Your ' . $response
            : $pronoun.'' .$response;

    }

}
