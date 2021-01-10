<?php

namespace Modules\Leave\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    protected $casts = [
        'is_requestable' => 'boolean',
        'is_assignable' => 'boolean'
    ];

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function leaveGroupEntitlements()
    {
        return $this->hasMany(LeaveGroupEntitlement::class);
    }
}
