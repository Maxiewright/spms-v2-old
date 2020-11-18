<?php

namespace App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem;


use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    public function ranks()
    {
        return $this->belongsToMany(Rank::class, 'branch_establishment')
            ->using(BranchEstablishment::class)
            ->withPivot('establishment');
    }

    public function streams()
    {
        return $this->hasMany(Stream::class);
    }


}
