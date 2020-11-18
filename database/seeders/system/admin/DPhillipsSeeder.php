<?php

namespace Database\Seeders\system\admin;

use App\Models\Authentication\User;
use App\Models\Serviceperson\EmailAddress;
use App\Models\Serviceperson\JobAppointment;
use App\Models\Serviceperson\PhoneNumber;
use App\Models\Serviceperson\Serviceperson;
use App\Services\ServicepersonServices\RetirementService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DPhillipsSeeder extends Seeder
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
                $dPhillips = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 149,
                        'first_name' => 'Damian',
                        'middle_name' => null,
                        'last_name' => 'Phillips',
                        'ethnicity_id' => 1,
                        'marital_status_id' => 2,
                        'religion_id' => 8,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $dPhillips->number;
                $initial = strtolower(substr($dPhillips->first_name, 0, 1));
                $lastName = strtolower($dPhillips->last_name);
                $serviceName = $number . $initial . $lastName;

                $dPhillips->photo()->create(['path' => $serviceName . '.jpg']);
                $user = $dPhillips->user()->create([
                    'username' => $serviceName,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');


//            Contact
                $dPhillips->addresses()->create([
                    'address1' => '226 Seventh Street East',
                    'address2' => 'Andrew Lane',
                    'city_or_town_id' => 138,
                ]);

                $email = EmailAddress::create(['email' => 'damian.phillips@ttdf.mil.tt']);
                $dPhillips->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '4988142']);
                $dPhillips->phoneNumbers()->attach($phone->id, ['phone_type_id' => 1]);

//                User account
                $user = $dPhillips->user()->create([
                    'username' => $serviceName,
                    'email'  => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');

//            Medical
                $dPhillips->measurements()->attach(70, ['measured_on' => now()]);
                $dPhillips->weights()->attach(25, ['weighed_on' => now()]);
                $dPhillips->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 1,
                    'skin_colour_id' => 5,
                    'blood_type_id' => 7,
                    'wears_glasses' => 0,
                    'wears_contacts' => 0,
                ]);

//            Service Data
                $dPhillips->enlistments()->create([
                    'enlistment_type_id' => 2,
                    'date' => '2000-12-07',
                    'engagement_period_id' => 1,
                ]);

                JobAppointment::withoutEvents(function () use ($dPhillips) {
                    $dPhillips->jobAppointments()->Create([
                        'job_id' => 19,
                        'started_on' => '2019-01-01',
                        'ended_on' => null,
                    ]);
                });

                $dPhillips->promotions()->attach(13, ['promoted_on' => '2015-01-01', 'substantive_on' => '2015-01-01',]);

                $dPhillips->units()->create([
                    'company_id' => 4,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => '2015-01-01',
                    'posted_on' => null,
                    'left_on' => null,
                ]);


//            Identification
                $dPhillips->militaryIdCard()->create([
                    'number' => '1490036312',
                    'issued_on' => '2019-03-18',
                    'expired_on' => '2022-03-17'
                ]);

                $nationalId = $dPhillips->nationalIdCard()->create([
                    'number' => '19781228054',
                    'date_of_birth' => '1978-12-28',
                    'place_of_birth' => 443,
                    'gender_id' => 1,
                    'issued_on' => '2018-07-06',
                    'expired_on' => '2028-07-06'
                ]);
//            Education
                $dPhillips->servicepersonEducation()->create([
                    'education_level_id' => 8,
                    'subject_id' => 28,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2017-09-01',
                ]);

//              Details
                $currentRankId = $dPhillips->lastPromotion->rank_id;

                $dPhillips->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $dPhillips->currentUnit->id,
                    'job_id' =>  $dPhillips->currentJob->job->id,
                    'career_path_id' => $dPhillips->currentJob->job->careerPath->id,
                    'stream_id' => $dPhillips->currentJob->job->careerPath->stream->id,
                    'branch_id' => $dPhillips->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $dPhillips->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);


            });
        });
    }
}
