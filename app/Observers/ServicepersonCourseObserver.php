<?php

namespace App\Observers;

use App\Models\Serviceperson\ServicepersonCourse;
use App\Services\FileServices\CertificateService;

class ServicepersonCourseObserver
{


    /**
     * Handle the serviceperson course "creating" event.
     *
     * @param ServicepersonCourse $servicepersonCourse
     * @param CertificateService $certificateService
     * @return void
     */
    public function creating(ServicepersonCourse $servicepersonCourse, CertificateService $certificateService)
    {
       $certificateService->storeEducationCertificate($servicepersonCourse);
    }

    /**
     * Handle the serviceperson course "created" event.
     *
     * @param ServicepersonCourse $servicepersonCourse
     * @return void
     */
    public function created(ServicepersonCourse $servicepersonCourse)
    {
        //
    }

    /**
     * Handle the serviceperson course "updated" event.
     *
     * @param ServicepersonCourse $servicepersonCourse
     * @return void
     */
    public function updated(ServicepersonCourse $servicepersonCourse)
    {
        //
    }

    /**
     * Handle the serviceperson course "deleted" event.
     *
     * @param ServicepersonCourse $servicepersonCourse
     * @return void
     */
    public function deleted(ServicepersonCourse $servicepersonCourse)
    {
        //
    }

    /**
     * Handle the serviceperson course "restored" event.
     *
     * @param  =\Serviceperson\ServicepersonCourse  $servicepersonCourse
     * @return void
     */
    public function restored(ServicepersonCourse $servicepersonCourse)
    {
        //
    }

    /**
     * Handle the serviceperson course "force deleted" event.
     *
     * @param ServicepersonCourse $servicepersonCourse
     * @return void
     */
    public function forceDeleted(ServicepersonCourse $servicepersonCourse)
    {
        //
    }
}
