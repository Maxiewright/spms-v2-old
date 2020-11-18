<?php

namespace App\Models\System\Universal\Polymorphic;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $guarded = [];

    public function certifiable()
    {
        return $this->morphTo();
    }
}
