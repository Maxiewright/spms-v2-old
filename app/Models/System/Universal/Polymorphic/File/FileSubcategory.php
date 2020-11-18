<?php

namespace App\Models\System\Universal\Polymorphic\File;

use Illuminate\Database\Eloquent\Model;

class FileSubcategory extends Model
{

    public $incrementing = false;

    protected $fillable = [
       'id', 'name', 'file_category_id', 'description'
    ];

    public function fileCategory(){
        return $this->belongsTo(FileCategory::class);
    }

    public  function  fileSubSubcategory(){
        return $this->hasMany(FileSubSubcategory::class);
    }

}
