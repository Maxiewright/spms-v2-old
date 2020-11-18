<?php

namespace App\Models\System\Universal\Polymorphic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function imageable()
    {
        return $this->morphTo();
    }
}
