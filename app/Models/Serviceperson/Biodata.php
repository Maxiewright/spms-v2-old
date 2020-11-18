<?php

namespace App\Models\Serviceperson;



use App\Models\System\Serviceperson\Biodata\BloodType;
use App\Models\System\Serviceperson\Biodata\EyeColour;
use App\Models\System\Serviceperson\Biodata\HairColour;
use App\Models\System\Serviceperson\Biodata\SkinColour;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class Biodata extends Model
{
    use  HasFactory, SoftDeletes;

    protected $fillable = [
        'eye_colour_id',
        'hair_colour_id',
        'skin_colour_id',
        'blood_type_id',
        'wears_glasses',
        'wears_contacts'
    ];

    public function serviceperson(){
        return $this->belongsTo(Serviceperson::class);
    }

    public function eyeColour(){
        return $this->belongsTo(EyeColour::class);
    }

    public function hairColour()
    {
    return $this->belongsTo(HairColour::class);
    }

    public function skinColour()
    {
        return $this->belongsTo(SkinColour::class);
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }


    public function getDescriptionAttribute()
    {
        $pronoun = $this->serviceperson->nationalIdCard->pronoun;

        $ethnicity = $this->serviceperson->ethnicity->name;
        $height = $this->serviceperson->height->name;
        $weight = $this->serviceperson->weight->name;
        $weighed_on = $this->serviceperson->weight->details->weighed_on->format('d M Y');

        $response = 'of ' . $ethnicity . ' decent, ' . strtolower($this->skinColour->name) . ' in completion, has ' .
            strtolower($this->eyeColour->name) . ' eyes and ' . strtolower($this->hairColour->name) . ' hair. '.
            $pronoun . 'is ' . $height . ' CM tall and weighed '.
            $weight . ' KG as at ' . $weighed_on .'.';

        return auth()->user()->serviceperson->number === $this->serviceperson->number
            ? 'You are ' . $response
            : $pronoun . ' is ' . $response;

    }



}
