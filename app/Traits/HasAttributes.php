<?php

namespace App\Traits;


trait HasAttributes
{


//**************************************************** Service Data ********************************************************

//    public function getLastPostingAttribute()
//    {
//        $this->unit()->orderBy('joined_on',  'DESC')->pluck('posted_on')->first();;
//    }

//    public function getPreviousUnitAttribute()
//    {
//        return Unit::where('id', '<', $this->id)
//            ->where(function ($q){
//                $q->where('serviceperson_number', session('serviceNumber'));
//            })
//            ->orderBy('id', 'desc')
//            ->first();
//    }
//
//
//    public function getPostingStatusAttribute()
//    {
//        $currentUnit = $this->unit()->orderBy('joined_on',  'DESC')->first();
//        $previousUnit = Unit::where('id', '<', $currentUnit->id)
//            ->where(function ($q){
//                $q->where('serviceperson_number', session('serviceNumber'));
//            })
//            ->orderBy('id', 'desc')
//            ->first();
//        return ($currentUnit->posted_on == null) ? 'Attached' : 'Posted';
//
//    }


}
