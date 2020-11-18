<?php

namespace App\Models\Serviceperson;

use App\Models\System\Serviceperson\Unit\Battalion;
use App\Models\System\Serviceperson\Unit\Company;
use App\Models\System\Serviceperson\Unit\Platoon;
use App\Models\System\Serviceperson\Unit\Section;
use App\Models\System\Universal\Polymorphic\File\File;
use App\Traits\MustBeApproved;
use Approval\Traits\RequiresApproval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Unit extends Model implements Auditable
{
    use  HasFactory, SoftDeletes, MustBeApproved, \OwenIt\Auditing\Auditable;

    public $fillable = [
        'serviceperson_number', 'company_id', 'platoon_id', 'section_id',
        'joined_on', 'posted_on', 'left_on',
    ];

    protected $dates = ['joined_on', 'posted_on' ,'left_on'];

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($unit){
            if($unit->is($unit->serviceperson->currentUnit))
                $unit->serviceperson->details()->update([
                    'unit_id' => $unit->id,
                ]);
        });
    }

    public function getModificationDetailsAttribute()
    {
        try {
            return $this->modificationDetails([
                'company' => $this->modificationAttribute('company_id', 'company'),
                'platoon' => $this->modificationAttribute('platoon_id', 'platoon'),
                'section' => $this->modificationAttribute('section_id', 'section'),
                'joined' => $this->modificationAttribute('joined_id', null, 'date'),
                'posted' => $this->modificationAttribute('posted_on',null, 'date'),
                'left' => $this->modificationAttribute('left_on', null, 'date'),
            ]);
        } catch (\Exception $e) {
        }
    }

    public function serviceperson(){
        return $this->belongsTo(Serviceperson::class);
    }

    public function battalion(){
        return $this->belongsTo(Battalion::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function platoon(){
        return $this->belongsTo(Platoon::class);
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function file()
    {
        $this->morphToMany(File::class, 'fileable');
    }



}
