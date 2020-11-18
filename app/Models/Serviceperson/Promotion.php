<?php

namespace App\Models\Serviceperson;

use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Database\Eloquent\Relations\Pivot;


class Promotion extends Pivot
{

    protected $table = 'promotions';

    protected $fillable = ['rank_id', 'serviceperson_number','promoted_on','substantive_on'];

    protected $dates = ['promoted_on','substantive_on'];

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::saved(function ($promotion){
//            if($promotion->is($promotion->serviceperson->lastPromotion))
//                $promotion->serviceperson->details()->update([
//                    'unit_id' => $promotion->rank_id,
//                ]);
//        });
//    }

    public function serviceperson()
    {
        return $this->belongsTo(Serviceperson::class);
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }
}
