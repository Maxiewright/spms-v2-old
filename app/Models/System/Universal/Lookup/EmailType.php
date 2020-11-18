<?php

namespace App\Models\System\Universal\Lookup;

use App\Models\Serviceperson\EmailAddress;
use Illuminate\Database\Eloquent\Model;

class EmailType extends Model
{
    public $fillable = ['name'];

    public function emailAddress()
    {
        return $this->hasOne(EmailAddress::class);
    }
}
