<?php

namespace Database\Seeders\system\admin;

use App\Models\Serviceperson\JobAppointment;
use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\EmailAddress;
use App\Models\Serviceperson\PhoneNumber;
use App\Models\User;
use App\Services\ServicepersonServices\RetirementService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AEdwardsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {

            Model::unsetEventDispatcher();

            Serviceperson::withoutEvents(function () {
                $aEdwards = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 300,
                        'first_name' => 'Alana',
                        'middle_name' => 'M',
                        'last_name' => 'Edwards',
                        'ethnicity_id' => 9,
                        'marital_status_id' => 2,
                        'religion_id' => 12,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $aEdwards->number;
                $initial = strtolower(substr($aEdwards->first_name, 0, 1));
                $lastName = strtolower($aEdwards->last_name);
                $serviceName = $number . $initial . $lastName;

                $aEdwards->photo()->create(['path' => $serviceName . '.jpg']);

//            Contact
                $aEdwards->addresses()->create([
                    'address1' => 'LP 83, Wyan Road',
                    'address2' => null,
                    'city_or_town_id' => 35,
                ]);

                $email = EmailAddress::create(['email' => 'allanamedwards@hotmail.com']);
                $aEdwards->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '797-1504']);
                $aEdwards->phoneNumbers()->attach($phone->id, ['phone_type_id' => 1]);

                //                User account
                $user = $aEdwards->user()->create([
                    'username' => $serviceName,
                    'email'  => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');

//            Medical
                $aEdwards->measurements()->attach(25, ['measured_on' => now()]);
                $aEdwards->weights()->attach(20, ['weighed_on' => now()]);
                $aEdwards->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 2,
                    'skin_colour_id' => 3,
                    'blood_type_id' => 1,
                    'wears_glasses' => 1,
                    'wears_contacts' => 1,
                ]);

//            Service Data
                $aEdwards->enlistments()->create([
                    'enlistment_type_id' => 3,
                    'date' => now(),
                    'engagement_period_id' => 3,
                ]);

                JobAppointment::withoutEvents(function () use ($aEdwards) {
                    $aEdwards->jobAppointments()->Create([
                        'job_id' => 50,
                        'started_on' => now(),
                        'ended_on' => null,
                    ]);
                });


                $aEdwards->promotions()->attach(13, ['promoted_on' => now(), 'substantive_on' => now(),]);

                $aEdwards->units()->create([
                    'company_id' => 4,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => now(),
                    'posted_on' => null,
                    'left_on' => null,
                ]);

//            Identification
                $aEdwards->militaryIdCard()->create([
                    'number' => '19771012005',
                    'issued_on' => '2020-01-01',
                    'expired_on' => '2023-01-01'
                ]);

                $nationalId = $aEdwards->nationalIdCard()->create([
                    'number' => '19771012005',
                    'date_of_birth' => '1977-10-12',
                    'place_of_birth' => 35,
                    'gender_id' => 2,
                    'issued_on' => '2011-08-09',
                    'expired_on' => '2021-08-09'
                ]);
//            Education
                $aEdwards->servicepersonEducation()->create([
                    'education_level_id' => 15,
                    'subject_id' => 23,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2010-01-01',
                ]);

//              Details
                $currentRankId = $aEdwards->lastPromotion->rank_id;

                $aEdwards->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $aEdwards->currentUnit->id,
                    'job_id' =>  $aEdwards->currentJob->job->id,
                    'career_path_id' => $aEdwards->currentJob->job->careerPath->id,
                    'stream_id' => $aEdwards->currentJob->job->careerPath->stream->id,
                    'branch_id' => $aEdwards->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $aEdwards->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);

            });
        });
    }
}
