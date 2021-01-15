<?php

namespace App\Models\System\Serviceperson\ServiceData;

use App\Models\Serviceperson\Deployment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DeploymentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    public function deployments(): HasMany
    {
        return $this->hasMany(Deployment::class);
    }
}
