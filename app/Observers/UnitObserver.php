<?php

namespace App\Observers;


use App\Models\Serviceperson\Unit;

class UnitObserver
{

    private static function previousUnit($unit)
    {
        return  Unit::where('id', '<', $unit->id)
            ->where(function ($q){
                $q->where('serviceperson_number', session('serviceNumber'));
            })
            ->orderBy('id', 'desc');
    }

    /**
     * Handle the unit "created" event.
     *
     * @param Unit $unit
     * @return void
     */
    public function created(Unit $unit)
    {
//        if($unit->posted_on != null) self::previousUnit($unit)
//            ->update([
//                'left_on' => $unit->posted_on->subDay()
//            ]);
    }

    /**
     * Handle the unit "updated" event.
     *
     * @param Unit $unit
     * @return void
     */
    public function updated(Unit $unit)
    {
//        if($unit->isDirty('posted_on')){
//            self::previousUnit($unit)
//                ->update([
//                    'left_on' => $unit->posted_on->subDay()
//                ]);
//        }

    }

    /**
     * Handle the unit "deleted" event.
     *
     * @param Unit $unit
     * @return void
     */
    public function deleted(Unit $unit)
    {
        //
    }

    /**
     * Handle the unit "restored" event.
     *
     * @param Unit $unit
     * @return void
     */
    public function restored(Unit $unit)
    {
        //
    }

    /**
     * Handle the unit "force deleted" event.
     *
     * @param Unit $unit
     * @return void
     */
    public function forceDeleted(Unit $unit)
    {
        //
    }
}
