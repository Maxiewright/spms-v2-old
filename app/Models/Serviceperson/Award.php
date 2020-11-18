<?php

namespace App\Models\Serviceperson;

use App\Models\System\Serviceperson\ServiceData\Decoration;
use Illuminate\Database\Eloquent\Relations\Pivot;


class Award extends Pivot
{

    protected $table = 'serviceperson_decoration';

    protected $fillable = ['decoration_id', 'serviceperson_number', 'received_on'];

    protected $dates = ['received_on'];

    public function serviceperson()
    {
       return $this->belongsTo(Serviceperson::class);
    }

    public function decoration()
    {
        return $this->belongsTo(Decoration::class);
    }
}
