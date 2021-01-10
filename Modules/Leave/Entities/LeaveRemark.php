<?php

namespace Modules\Leave\Entities;

use Illuminate\Database\Eloquent\Model;

class LeaveRemark extends Model
{
    protected $fillable = [
        'body'
    ];

    public function remarkable()
    {
        return $this->morphTo();
    }
}
