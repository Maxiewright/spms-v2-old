<?php

namespace Modules\Leave\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveGroupEntitlement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'leave_type_id',
        'leave_group_id',
        'days_entitled',
        'is_accurable',
        'max_acurable_days'
    ];

    public function type()
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id');
    }

    public function group()
    {
        return $this->belongsTo(LeaveGroup::class, 'leave_group_id');
    }

    public function getNameAttribute()
    {
        return $this->group->name.' ('. $this->type->name . ')';
    }
}
