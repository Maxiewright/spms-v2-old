<?php

namespace App\Models\System\Universal\Polymorphic\File;

use Illuminate\Database\Eloquent\Model;

class FileSubSubcategory extends Model
{

    public $incrementing = false;

    protected $fillable = [
       'id', 'name', 'slug', 'file_subcategory_id', 'description',
    ];

    public function fileSubcategory(){
        return $this->belongsTo(FileSubcategory::class);
    }

}
