<?php

namespace App\Models\Serviceperson;


use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MilitaryIdCard extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'number';
    public $incrementing = false;

    protected $fillable = [
        'number',
        'serviceperson_number',
        'issued_on',
        'expired_on'
    ];

    protected $dates = ['issued_on', 'expired_on'];

    public function serviceperson()
    {
       return $this->belongsTo(Serviceperson::class);
    }

    public function getStatementAttribute()
    {
        ($this->serviceperson->gender_id == 1)
            ? $pronoun = 'His '
            : $pronoun = 'Her ';

        ($this->expired_on->isBefore(now()))
            ? $response =  'Military ID, #'. $this->number. ', expired '. $this->expired_on->endOfDay()->diffForHumans()
            : $response =  'Military ID, #'. $this->number. ', will expire in '. $this->expired_on->endOfDay()->diffForHumans(['syntax' => CarbonInterface::DIFF_ABSOLUTE]);

        return auth()->user()->serviceperson->number === $this->serviceperson->number
            ? 'Your ' . $response
            : $pronoun.'' .$response;
    }
}
