<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Serviceperson\Dependent;
use App\Models\Serviceperson\EmergencyContact;
use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\ServicepersonCourse;
use App\Models\Serviceperson\ServicepersonEducation;
use App\Models\Serviceperson\Unit;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;


class RelationsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'Serviceperson Education' => ServicepersonEducation::class,
            'Serviceperson Course' => ServicepersonCourse::class,
            'Emergency Contact' => EmergencyContact::class,
            'Serviceperson' => Serviceperson::class,
            'Dependent' => Dependent::class,
            'Unit' => Unit::class,
            'User' => User::class,
        ]);
    }
}
