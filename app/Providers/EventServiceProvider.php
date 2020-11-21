<?php

namespace App\Providers;

use App\Events\FirstLogin;
use App\Listeners\SendFirstLoginEmailVerificationNotification;
use App\Models\Serviceperson\EmailAddress;
use App\Models\Serviceperson\JobAppointment;
use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\Unit;
use App\Observers\Approval\ApprovalObserver;
use App\Observers\Approval\DisapprovalObserver;
use App\Observers\Approval\ModificationObserver;
use App\Observers\EmailAddressObserver;
use App\Observers\JobAppointmentObserver;
use App\Observers\ServicepersonObserver;
use App\Observers\UnitObserver;
use Approval\Models\Approval;
use Approval\Models\Disapproval;
use Approval\Models\Modification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        FirstLogin::class => [
            SendFirstLoginEmailVerificationNotification::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        Unit::observe(UnitObserver::class);
        Serviceperson::observe(ServicepersonObserver::class);
        JobAppointment::observe(JobAppointmentObserver::class);
        EmailAddress::observe(EmailAddressObserver::class);
//        Approval System
        Modification::observe(ModificationObserver::class);
        Approval::observe(ApprovalObserver::class);
        Disapproval::observe(DisapprovalObserver::class);
    }
}
