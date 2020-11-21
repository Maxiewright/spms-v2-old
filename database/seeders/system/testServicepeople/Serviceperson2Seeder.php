<?php

namespace Database\Seeders\system\testServicepeople;

use App\Models\User;
use App\Models\Serviceperson\EmailAddress;
use App\Models\Serviceperson\JobAppointment;
use App\Models\Serviceperson\PhoneNumber;
use App\Models\Serviceperson\Serviceperson;
use App\Services\ServicepersonServices\RetirementService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Serviceperson2Seeder extends Seeder
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
                $sServiceperson2 = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 2002,
                        'first_name' => 'SpMS',
                        'middle_name' => null,
                        'last_name' => 'Serviceperson2',
                        'ethnicity_id' => 9,
                        'marital_status_id' => 2,
                        'religion_id' => 12,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $sServiceperson2->number;
                $initial = strtolower(substr($sServiceperson2->first_name, 0, 1));
                $lastName = strtolower($sServiceperson2->last_name);
                $serviceName = $number . $initial . $lastName;

                $sServiceperson2->photo()->create(['path' => $serviceName . '.jpg']);

//            Contact
                $sServiceperson2->addresses()->create([
                    'address1' => 'Corner Knox and Abercromby Streets',
                    'address2' => null,
                    'city_or_town_id' => 379,
                ]);


                $email = EmailAddress::create(['email' => 'serviceperson2@spms.live']);
                $sServiceperson2->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '627-2782']);
                $sServiceperson2->phoneNumbers()->attach($phone->id, ['phone_type_id' => 1]);

                //                User account
                $user = $sServiceperson2->user()->create([
                    'username' => $serviceName,
                    'email'  => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('serviceperson');

//            Medical
                $sServiceperson2->measurements()->attach(25, ['measured_on' => now()]);
                $sServiceperson2->weights()->attach(20, ['weighed_on' => now()]);
                $sServiceperson2->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 2,
                    'skin_colour_id' => 3,
                    'blood_type_id' => 1,
                    'wears_glasses' => 1,
                    'wears_contacts' => 1,
                ]);

//            Service Data
                $sServiceperson2->enlistments()->create([
                    'enlistment_type_id' => 3,
                    'date' => now(),
                    'engagement_period_id' => 3,
                ]);

                JobAppointment::withoutEvents(function () use ($sServiceperson2) {
                    $sServiceperson2->jobAppointments()->Create([
                        'job_id' => 12,
                        'started_on' => now(),
                        'ended_on' => null,
                    ]);
                });

                $sServiceperson2->promotions()->attach(3, ['promoted_on' => now(), 'substantive_on' => now(),]);

                $sServiceperson2->units()->create([
                    'company_id' => 6,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => now(),
                    'posted_on' => null,
                    'left_on' => null,
                ]);

//            Identification
                $sServiceperson2->militaryIdCard()->create([
                    'number' => '19623108002',
                    'issued_on' => '2020-01-01',
                    'expired_on' => '2023-01-01'
                ]);

                $nationalId = $sServiceperson2->nationalIdCard()->create([
                    'number' => '19623108002',
                    'date_of_birth' => '1962-31-08',
                    'place_of_birth' => 379,
                    'gender_id' => 2,
                    'issued_on' => '2011-08-09',
                    'expired_on' => '2021-08-09'
                ]);
//            Education
                $sServiceperson2->servicepersonEducation()->create([
                    'education_level_id' =>4,
                    'subject_id' => 51,
                    'education_grade_id' => 1,
                    'school_id' => 187,
                    'completed_on' => '2010-01-01',
                ]);

//              Details
                $currentRankId = $sServiceperson2->lastPromotion->rank_id;

                $sServiceperson2->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $sServiceperson2->currentUnit->id,
                    'job_id' =>  $sServiceperson2->currentJob->job->id,
                    'career_path_id' => $sServiceperson2->currentJob->job->careerPath->id,
                    'stream_id' => $sServiceperson2->currentJob->job->careerPath->stream->id,
                    'branch_id' => $sServiceperson2->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $sServiceperson2->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);

            });
        });
    }
}
