<?php

namespace Modules\Records\Entities\Index;

use App\Models\Serviceperson\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Records\Database\factories\Index\FileFactory;

class File extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return FileFactory::new();
    }

    protected $fillable = [
        'path', 'file_category_id', 'file_subcategory_id', 'file_sub_subcategory_id', 'description'
    ];

    public function unit()
    {
        return $this->morphedByMany(Unit::class, 'fileable');
    }
}
