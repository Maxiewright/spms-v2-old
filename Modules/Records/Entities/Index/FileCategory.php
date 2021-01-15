<?php

namespace Modules\Records\Entities\Index;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Records\Database\factories\Index\FileCategoryFactory;

class FileCategory extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return FileCategoryFactory::new();
    }

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
