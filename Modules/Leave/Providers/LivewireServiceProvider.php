<?php


namespace Modules\Leave\Providers;


use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Modules\Leave\Http\Livewire\Adjustments\Adjustments;
use Modules\Leave\Http\Livewire\AllLeave;
use Modules\Leave\Http\Livewire\Entitlement\CreateEntitlement;
use Modules\Leave\Http\Livewire\Entitlement\MassCreateEntitlement;
use Modules\Leave\Http\Livewire\Entitlement\ShowEntitlement;
use Modules\Leave\Http\Livewire\Leave\CreateLeave;
use Modules\Leave\Http\Livewire\Reports\Current;
use Modules\Leave\Http\Livewire\Reports\Excessive;
use Modules\Leave\Http\Livewire\Reports\Pending;

class LivewireServiceProvider extends ServiceProvider
{

    public function boot()
    {

//        Leave
        Livewire::component('all-leave', AllLeave::class);
        Livewire::component('create-leave', CreateLeave::class);

//        Entitlement
        Livewire::component('entitlements', ShowEntitlement::class);
        Livewire::component('create-entitlement', CreateEntitlement::class);
        Livewire::component('mass-create-entitlement', MassCreateEntitlement::class);

//        Adjustments
        Livewire::component('adjustments', Adjustments::class);

//        Reports
        Livewire::component('excessive', Excessive::class);
        Livewire::component('current', Current::class);
        Livewire::component('pending', Pending::class);
    }

}
