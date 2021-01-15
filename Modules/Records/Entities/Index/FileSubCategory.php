<?php

namespace Modules\Records\Entities\Index;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Records\Database\factories\Index\FileSubCategoryFactory;

class FileSubCategory extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id', 'name', 'file_category_id', 'description'
    ];

    protected static function newFactory()
    {
        return FileSubCategoryFactory::new();
    }

    public function fileCategory(){
        return $this->belongsTo(FileCategory::class);
    }

    public  function  fileSubSubcategory(){
        return $this->hasMany(FileSubSubcategory::class);
    }


}
