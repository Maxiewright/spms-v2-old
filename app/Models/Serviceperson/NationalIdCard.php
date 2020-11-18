<?php

namespace App\Models\Serviceperson;

use App\Models\System\Serviceperson\Address\CityOrTown;
use App\Models\System\Universal\Lookup\Gender;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class NationalIdCard extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'number';

    public $incrementing = false;

    protected $fillable = [
        'number',
        'serviceperson_number',
        'date_of_birth',
        'place_of_birth',
        'gender_id',
        'issued_on',
        'expired_on'
    ];

    protected $dates = ['date_of_birth','issued_on', 'expired_on'];

    public function serviceperson(){
        return $this->belongsTo(Serviceperson::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function cityOrTown(){
        return $this->belongsTo(CityOrTown::class, 'place_of_birth');
    }

    public function getAgeAttribute(){
        return (new Carbon($this->date_of_birth))->diffInYears(now()) ;
    }

    public function getPronounAttribute()
    {
      return  $this->gender_id == 1
            ? $pronoun = 'He '
            : $pronoun = 'She ';
    }

    public function getStatementAttribute()
    {
        ($this->gender_id == 1)
            ? $pronoun = 'His '
            : $pronoun = 'Her ';

        ($this->expired_on->isBefore(now()))
            ? $response =  'National ID, #'. $this->number. ', expired '. $this->expired_on->endOfDay()->diffForHumans()
            : $response =  'National ID, #'. $this->number. ', will expire in '. $this->expired_on->endOfDay()->diffForHumans(['syntax' => CarbonInterface::DIFF_ABSOLUTE]);

        return auth()->user()->serviceperson->number === $this->serviceperson->number
            ? 'Your ' . $response
            : $pronoun.'' .$response;
    }




}
