<?php

namespace App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem;

use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    protected $fillable = [
        'branch_id', 'name', 'slug'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function careerPaths()
    {
       return $this->hasMany(CareerPath::class);
    }

    public function ranks()
    {
        return$this->belongsToMany(Rank::class, 'stream_establishment')
            ->using(StreamEstablishment::class)
            ->withPivot('establishment')
            ->withTimestamps();
    }

}
