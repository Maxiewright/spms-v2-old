<?php

namespace App\Observers;



use App\Models\Serviceperson\JobAppointment;
use App\Models\Serviceperson\Serviceperson;

class JobAppointmentObserver
{

    /**
     * Handle the job appointment "created" event.
     *
     * @param JobAppointment $jobAppointment
     * @return void
     */
    public function created(JobAppointment $jobAppointment)
    {
        $this->attachRole($jobAppointment);
    }

    /**
     * Handle the job appointment "updated" event.
     *
     * @param JobAppointment $jobAppointment
     * @return void
     */
    public function updated(JobAppointment $jobAppointment)
    {
        $this->attachRole($jobAppointment);
    }

    /**
     * Handle the job appointment "deleted" event.
     *
     * @param JobAppointment $jobAppointment
     * @return void
     */
    public function deleted(JobAppointment $jobAppointment)
    {
       ;
    }

    /**
     * Handle the job appointment "restored" event.
     *
     * @param JobAppointment $jobAppointment
     * @return void
     */
    public function restored(JobAppointment $jobAppointment)
    {
        $this->attachRole($jobAppointment);
    }

    /**
     * Handle the job appointment "force deleted" event.
     *
     * @param JobAppointment $jobAppointment
     * @return void
     */
    public function forceDeleted(JobAppointment $jobAppointment)
    {
        //
    }

    private function attachRole($jobAppointment)
    {
        $job = $jobAppointment->job->title->slug;
        $serviceperson = Serviceperson::find($jobAppointment->serviceperson_number)->user;
        switch ($job) {
//            Command Roles
                case 'COTTR':
                    $serviceperson->syncRoles(['brigade-commander']);
                    break;
                case 'Brig 2IC':
                    $serviceperson->syncRoles(['brigade-second']);
                    break;
                case 'CO':
                    $serviceperson->syncRoles(['battalion-commander']);
                    break;
                case 'BN 2IC':
                    $serviceperson->syncRoles(['battalion-second']);
                    break;
                case 'OC':
                    $serviceperson->syncRoles(['company-commander']);
                    break;
                case 'Coy 2IC':
                    $serviceperson->syncRoles(['company-second']);
                    break;
                case 'Pl Comd':
                    $serviceperson->syncRoles(['platoon-commander']);
                    break;
                case 'Pl Sgt':
                    $serviceperson->syncRoles(['platoon-second']);
                    break;
                case 'Sect Comd':
                    $serviceperson->syncRoles(['section-commander']);
                    break;
                case 'Sect 2IC':
                    $serviceperson->syncRoles(['section-second']);
                    break;
//                Advisory Roles
                case 'Comd':
                    $serviceperson->syncRoles(['brigade-advisor']);
                    break;
                case 'RSM':
                case 'DSM':
                case 'SFSM':
                    $serviceperson->syncRoles(['battalion-advisor']);
                    break;
                case 'CSM':
                case 'FSSM':
                case 'BSM':
                    $serviceperson->syncRoles(['company-advisor']);
                    break;
//                Administrative Roles
                case 'Chief Clerk':
                    $serviceperson->syncRoles(['chief-clerk']);
                    break;
                case 'Admin NCO':
                    $serviceperson->syncRoles(['admin-nco']);
                    break;
                case 'Admin Clerk':
                    $serviceperson->syncRoles(['admin-clerk']);
                    break;
//                Personnel Roles
                case 'G1':
                    $serviceperson->syncRoles(['g1']);
                    break;
                case 'G1-Legal':
                    $serviceperson->syncRoles(['g1-legal']);
                    break;
                case 'HRO':
                    $serviceperson->syncRoles(['hro']);
                    break;
                case 'HR WO':
                    $serviceperson->syncRoles(['hr-wo']);
                    break;
                case 'HR SNCO':
                    $serviceperson->syncRoles(['hr-snco']);
                    break;
                case 'HR Clerk':
                    $serviceperson->syncRoles(['hr-clerk']);
                    break;
                default:
                    $serviceperson->syncRoles(['serviceperson']);
            }

    }
}
