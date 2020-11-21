<?php

namespace Database\Seeders\system\hr;

use App\Models\Serviceperson\JobAppointment;
use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\EmailAddress;
use App\Models\Serviceperson\PhoneNumber;
use App\Models\Authentication\User;
use App\Services\ServicepersonServices\RetirementService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SAntoinetteSeeder extends Seeder
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
                $sAntoinette = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 10557,
                        'first_name' => 'Schuler',
                        'middle_name' => 'Sherman',
                        'last_name' => 'Antoinette',
                        'ethnicity_id' => 1,
                        'marital_status_id' => 1,
                        'religion_id' => 8,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $sAntoinette->number;
                $initial = strtolower(substr($sAntoinette->first_name, 0, 1));
                $lastName = strtolower($sAntoinette->last_name);
                $serviceName = $number . $initial . $lastName;

                $sAntoinette->photo()->create(['path' => $serviceName . '.jpg']);

//            Contact
                $sAntoinette->addresses()->create([
                    'address1' => 'Unit 44D Poinsetta Avenue 15 Street 500 South',
                    'address2' => null,
                    'city_or_town_id' => 82,
                ]);

                $email = EmailAddress::create(['email' => 'fastttrap@yahoo.com']);
                $sAntoinette->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => 6272785]);
                $sAntoinette->phoneNumbers()->attach($phone->id, ['phone_type_id' => 2]);


//                User account
                $user = $sAntoinette->user()->create([
                    'username' => $serviceName,
                    'email'  => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');

//            Medical
                $sAntoinette->measurements()->attach(63, ['measured_on' => now()]);
                $sAntoinette->weights()->attach(24, ['weighed_on' => now()]);
                $sAntoinette->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 1,
                    'skin_colour_id' => 5,
                    'blood_type_id' => 7,
                    'wears_glasses' => 0,
                    'wears_contacts' => 0,
                ]);

//            Service Data
                $sAntoinette->enlistments()->create([
                    'enlistment_type_id' => 1,
                    'date' => '2003-09-29',
                    'engagement_period_id' => 1,
                ]);
                JobAppointment::withoutEvents(function () use ($sAntoinette) {
                    $sAntoinette->jobAppointments()->create([
                        'job_id' => 44,
                        'started_on' => now(),
                        'ended_on' => null,
                    ]);
                });

                $sAntoinette->promotions()->attach(4, ['promoted_on' => '2019-03-25', 'substantive_on' => null,]);

                $sAntoinette->units()->create([
                    'company_id' => 4,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => now(),
                    'posted_on' => null,
                    'left_on' => null
                ]);


//            Identification
                $sAntoinette->militaryIdCard()->create([
                    'number' => '105570281007',
                    'issued_on' => now(),
                    'expired_on' => now()->addDays(31)
                ]);

                $nationalId = $sAntoinette->nationalIdCard()->create([
                    'number' => '19790522056',
                    'date_of_birth' => '1979-05-23',
                    'place_of_birth' => 163,
                    'gender_id' => 1,
                    'issued_on' => '2020-01-08',
                    'expired_on' => '2022-09-13'
                ]);
//            Education
                $sAntoinette->servicepersonEducation()->create([
                    'education_level_id' => 6,
                    'subject_id' => 47,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2016-01-01',
                ]);

//              Details
                $currentRankId = $sAntoinette->lastPromotion->rank_id;

                $sAntoinette->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $sAntoinette->currentUnit->id,
                    'job_id' =>  $sAntoinette->currentJob->job->id,
                    'career_path_id' => $sAntoinette->currentJob->job->careerPath->id,
                    'stream_id' => $sAntoinette->currentJob->job->careerPath->stream->id,
                    'branch_id' => $sAntoinette->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $sAntoinette->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);
            });
        });
    }
}
