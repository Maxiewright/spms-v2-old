<?php

namespace App\Models\Serviceperson;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Passport extends Model
{
    use HasFactory;

    protected $primaryKey = 'number';

    public $incrementing = false;

    protected $fillable = [
        'number',
        'serviceperson_number',
        'issued_on',
        'expired_on'
    ];

    protected $dates = ['issued_on', 'expired_on'];

    public function serviceperson() {
        return $this->belongsTo(Serviceperson::class);
    }

    public function getStatementAttribute()
    {
        $pronoun = $this->serviceperson->nationalIdCard->pronoun;

//        Generate statement based on validity
        ($this->expired_on->isBefore(now()))
                ? $response = 'Passport, #' .$this->number. ', is invalid . It expired '. $this->expired_on->endOfDay()->diffForHumans()
                : $response = 'Passport, #' .$this->number. ', is valid. It will expire in '. $this->expired_on->endOfDay()->diffForHumans();

        return auth()->user()->serviceperson->number === $this->serviceperson->number
            ? 'Your ' . $response
            : $pronoun.'' .$response;

    }
}
