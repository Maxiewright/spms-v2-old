<?php

namespace App\Models\System\Dependent;

use App\Models\Serviceperson\Dependent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DependentRelationship extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function dependents()
    {
        return $this->belongsToMany(Dependent::class);
    }

}
