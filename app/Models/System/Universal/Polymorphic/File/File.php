<?php

namespace App\Models\System\Universal\Polymorphic\File;

use App\Models\Serviceperson\Unit;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'path', 'file_category_id', 'file_subcategory_id', 'file_sub_subcategory_id', 'description'
    ];

    public function unit()
    {
       return $this->morphedByMany(Unit::class, 'fileable');
    }
}
