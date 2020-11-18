<?php

namespace Database\Seeders\system\admin;

use App\Models\Serviceperson\JobAppointment;
use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\EmailAddress;
use App\Models\Serviceperson\PhoneNumber;
use App\Models\Authentication\User;
use App\Services\SeedingServices\DetailsService;
use App\Services\ServicepersonServices\RetirementService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MWrightSeeder extends Seeder
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
                $mWright = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 198,
                        'first_name' => 'Maxie',
                        'middle_name' => 'Joseph',
                        'last_name' => 'Wright',
                        'ethnicity_id' => 1,
                        'marital_status_id' => 2,
                        'religion_id' => 8,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $mWright->number;
                $initial = strtolower(substr($mWright->first_name, 0, 1));
                $lastName = strtolower($mWright->last_name);
                $serviceName = $number . $initial . $lastName;

                $mWright->photo()->create(['path' => $serviceName . '.jpg']);

//            Contact
                $mWright->addresses()->create([
                    'address1' => '22 Mc Gillivary Road',
                    'address2' => null,
                    'city_or_town_id' => 440,
                ]);

                $email = EmailAddress::create(['email' => 'maxiewright@gmail.com']);
                $mWright->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '6894550']);
                $mWright->phoneNumbers()->attach($phone->id, ['phone_type_id' => 1]);


                $user = $mWright->user()->create([
                    'username' => $serviceName,
                    'email' => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');

//            Medical
                $mWright->measurements()->attach(25, ['measured_on' => now()]);
                $mWright->weights()->attach(20, ['weighed_on' => now()]);
                $mWright->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 1,
                    'skin_colour_id' => 3,
                    'blood_type_id' => 7,
                    'wears_glasses' => 1,
                    'wears_contacts' => 0,
                ]);

//            Service Data
                $mWright->enlistments()->create([
                    'enlistment_type_id' => 2,
                    'date' => '2009-09-14',
                    'engagement_period_id' => 1,
                ]);

                JobAppointment::withoutEvents(function () use ($mWright) {
                    $mWright->jobAppointments()->Create([
                        'job_id' => 6,
                        'started_on' => '2020-05-06',
                        'ended_on' => null,
                    ]);
                });

                $mWright->promotions()->attach(11, ['promoted_on' => '2012-03-05', 'substantive_on' => '2012-03-05',]);

                $mWright->units()->create([
                    'company_id' => 9,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => '2020-05-06',
                    'posted_on' => null,
                    'left_on' => null,
                ]);


//            Identification
                $mWright->militaryIdCard()->create([
                    'number' => '1980557807',
                    'issued_on' => '2017-06-14',
                    'expired_on' => '2020-06-13'
                ]);

                $nationalId = $mWright->nationalIdCard()->create([
                    'number' => '19840902021',
                    'date_of_birth' => '1984-09-02',
                    'place_of_birth' => 163,
                    'gender_id' => 1,
                    'issued_on' => '2011-08-09',
                    'expired_on' => '2021-08-09'
                ]);
//            Education
                $mWright->servicepersonEducation()->create([
                    'education_level_id' => 6,
                    'subject_id' => 47,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2016-01-01',
                ]);

                DetailsService::details($mWright, $nationalId);
                //              Details
//                $currentRankId = $mWright->lastPromotion->rank_id;
//
//                $mWright->update([
//                    'rank_id' => $currentRankId,
//                    'unit_id' => $mWright->currentUnit->id,
//                    'job_id' =>  $mWright->currentJob->job->id,
//                    'career_path_id' => $mWright->currentJob->job->careerPath->id,
//                    'stream_id' => $mWright->currentJob->job->careerPath->stream->id,
//                    'branch_id' => $mWright->currentJob->job->careerPath->stream->branch->id,
//                    're_engagement_date' => $mWright->lastEnlistment->contract_end ?? null,
//                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
//                ]);
            });
        });
    }
}
