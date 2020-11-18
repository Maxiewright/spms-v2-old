<?php

namespace App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem;

use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Database\Eloquent\Model;

class CareerPath extends Model
{

    protected $fillable = [
        'stream_id', 'name', 'slug'
    ];

    public function specialties()
    {
        return $this->hasMany(Specialty::class);
    }

    public function stream()
    {
        return $this->belongsTo(Stream::class);
    }

    public function ranks()
    {
        return $this->belongsToMany(Rank::class, 'career_path_establishment')
            ->using(CareerPathEstablishment::class)
            ->withTimestamps();
    }
}
