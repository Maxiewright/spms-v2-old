<?php

namespace Modules\Leave\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveAdjustmentReason extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'description'
    ];

    public function adjustments()
    {
        return $this->hasMany(LeaveAdjustment::class);
    }
}
