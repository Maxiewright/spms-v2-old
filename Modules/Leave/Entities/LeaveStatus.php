<?php

namespace Modules\Leave\Entities;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveStatus extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return LeaveStatusFactory::new();
    }

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function leave()
    {
        return $this->hasMany(Leave::class);
    }
}
