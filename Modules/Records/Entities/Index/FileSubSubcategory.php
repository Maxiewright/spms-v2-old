<?php

namespace Modules\Records\Entities\Index;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Records\Database\factories\Index\FileSubSubCategoryFactory;

class FileSubSubcategory extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return FileSubSubCategoryFactory::new();
    }

    public $incrementing = false;

    protected $fillable = [
        'id', 'name', 'slug', 'file_subcategory_id', 'description',
    ];

    public function fileSubcategory(){
        return $this->belongsTo(FileSubcategory::class);
    }


}
