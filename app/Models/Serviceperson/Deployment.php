<?php

namespace App\Models\Serviceperson;

use App\Models\System\Serviceperson\ServiceData\DeploymentCountry;
use App\Models\System\Serviceperson\ServiceData\DeploymentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deployment extends Model
{
    use HasFactory;

    protected $fillable = [
        'serviceperson_number',
        'deployment_type_id',
        'deployment_county_id',
        'from',
        'to',
        'particulars',
    ];

    public function serviceperson(): BelongsTo
    {
        return $this->belongsTo(Serviceperson::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(DeploymentType::class, 'deployment_type_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(DeploymentCountry::class, 'deployment_county_id');
    }
}
