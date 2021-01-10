<?php

namespace Modules\Leave\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    public function leaveGroupEntitlement()
    {
        return $this->hasMany(LeaveGroupEntitlement::class);
    }
}
