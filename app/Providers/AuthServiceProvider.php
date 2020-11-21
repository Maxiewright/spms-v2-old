<?php

namespace App\Providers;

use App\Models\Serviceperson\Address;
use App\Models\Serviceperson\Award;
use App\Models\Serviceperson\Biodata;
use App\Models\Serviceperson\Dependent;
use App\Models\Serviceperson\DriversPermit;
use App\Models\Serviceperson\EmailAddress;
use App\Models\Serviceperson\EmergencyContact;
use App\Models\Serviceperson\Enlistment;
use App\Models\Serviceperson\JobAppointment;
use App\Models\Serviceperson\Measurement;
use App\Models\Serviceperson\MedicalClassification;
use App\Models\Serviceperson\MilitaryIdCard;
use App\Models\Serviceperson\NationalIdCard;
use App\Models\Serviceperson\Passport;
use App\Models\Serviceperson\PhoneNumber;
use App\Models\Serviceperson\Promotion;
use App\Models\Serviceperson\ReEngagement;
use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\ServicepersonAllergy;
use App\Models\Serviceperson\ServicepersonCourse;
use App\Models\Serviceperson\ServicepersonEducation;
use App\Models\Serviceperson\ServicepersonHobby;
use App\Models\Serviceperson\ServicepersonMedicalCondition;
use App\Models\Serviceperson\ServicepersonSport;
use App\Models\Serviceperson\ServicepersonVaccine;
use App\Models\Serviceperson\Unit;
use App\Models\Serviceperson\Weigh;
use App\Models\Team;
use App\Policies\Serviceperson\AddressPolicy;
use App\Policies\Serviceperson\BiodataPolicy;
use App\Policies\Serviceperson\DependentPolicy;
use App\Policies\Serviceperson\DriversPermitPolicy;
use App\Policies\Serviceperson\EmailAddressPolicy;
use App\Policies\Serviceperson\EmergencyContactPolicy;
use App\Policies\Serviceperson\EnlistmentPolicy;
use App\Policies\Serviceperson\Extracurricular\ServicepersonHobbyPolicy;
use App\Policies\Serviceperson\Extracurricular\ServicepersonSportPolicy;
use App\Policies\Serviceperson\JobAppointmentPolicy;
use App\Policies\Serviceperson\MedicalClassificationPolicy;
use App\Policies\Serviceperson\MedicalHistory\MeasurementPolicy;
use App\Policies\Serviceperson\MedicalHistory\ServicepersonAllergyPolicy;
use App\Policies\Serviceperson\MedicalHistory\ServicepersonMedicalConditionPolicy;
use App\Policies\Serviceperson\MedicalHistory\ServicepersonVaccinePolicy;
use App\Policies\Serviceperson\MedicalHistory\WeighPolicy;
use App\Policies\Serviceperson\MilitaryIdCardPolicy;
use App\Policies\Serviceperson\NationalIdCardPolicy;
use App\Policies\Serviceperson\PassportPolicy;
use App\Policies\Serviceperson\PhoneNumberPolicy;
use App\Policies\Serviceperson\PromotionPolicy;
use App\Policies\Serviceperson\ReEngagementPolicy;
use App\Policies\Serviceperson\ServiceData\AwardPolicy;
use App\Policies\Serviceperson\ServicepersonCoursePolicy;
use App\Policies\Serviceperson\ServicepersonEducationPolicy;
use App\Policies\Serviceperson\ServicepersonPolicy;
use App\Policies\Serviceperson\UnitPolicy;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        Serviceperson::class => ServicepersonPolicy::class,
        Address::class => AddressPolicy::class,
        Biodata::class => BiodataPolicy::class,
        Dependent::class => DependentPolicy::class,
        DriversPermit::class => DriversPermitPolicy::class,
        EmailAddress::class => EmailAddressPolicy::class,
        EmergencyContact::class => EmergencyContactPolicy::class,
        Enlistment::class => EnlistmentPolicy::class,
        JobAppointment::class => JobAppointmentPolicy::class,
        Measurement::class => MeasurementPolicy::class,
        MedicalClassification::class => MedicalClassificationPolicy::class,
        MilitaryIdCard::class => MilitaryIdCardPolicy::class,
        NationalIdCard::class => NationalIdCardPolicy::class,
        Passport::class => PassportPolicy::class,
        PhoneNumber::class => PhoneNumberPolicy::class,
        Promotion::class => PromotionPolicy::class,
        ReEngagement::class => ReEngagementPolicy::class,
        ServicepersonCourse::class => ServicepersonCoursePolicy::class,
        ServicepersonEducation::class => ServicepersonEducationPolicy::class,
        Unit::class => UnitPolicy::class,
        Weigh::class => WeighPolicy::class,
        Award::class => AwardPolicy::class,

//        Medical History
        ServicepersonVaccine::class => ServicepersonVaccinePolicy::class,
        ServicepersonAllergy::class => ServicepersonAllergyPolicy::class,
        ServicepersonMedicalCondition::class => ServicepersonMedicalConditionPolicy::class,

//        Extracurricular
        ServicepersonSport::class => ServicepersonSportPolicy::class,
        ServicepersonHobby::class => ServicepersonHobbyPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Implicitly grant "Super Admin" role all permission checks using can()
        Gate::before(function ($user) {
            if ($user->hasRole('super-admin')) {
                return true;
            }
        });
    }
}
