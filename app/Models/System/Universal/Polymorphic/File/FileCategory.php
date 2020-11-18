<?php

namespace App\Models\System\Universal\Polymorphic\File;

use Illuminate\Database\Eloquent\Model;

class FileCategory extends Model
{
    public $incrementing = false;

    protected $fillable = ['id', 'name', 'description'];

    public function file()
    {
        return $this->belongsTo(File::class);
    }
    public function fileSubcategory(){
        return $this->hasMany(FileSubcategory::class);
    }
}
