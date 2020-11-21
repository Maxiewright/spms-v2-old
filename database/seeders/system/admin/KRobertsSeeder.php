<?php

namespace Database\Seeders\system\admin;

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

class KRobertsSeeder extends Seeder
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
                $kRoberts = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 200,
                        'first_name' => 'Kemal',
                        'middle_name' => null,
                        'last_name' => 'Roberts',
                        'ethnicity_id' => 1,
                        'marital_status_id' => 2,
                        'religion_id' => 12,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $kRoberts->number;
                $initial = strtolower(substr($kRoberts->first_name, 0, 1));
                $lastName = strtolower($kRoberts->last_name);
                $serviceName = $number . $initial . $lastName;

                $kRoberts->photo()->create(['path' => $serviceName . '.jpg']);
//            Contact
                $kRoberts->addresses()->create([
                    'address1' => '154 Opal Crescent',
                    'address2' => 'Edinburgh 500',
                    'city_or_town_id' => 82,
                ]);

                $email = EmailAddress::create(['email' => 'kemalroberts@gmail.com']);
                $kRoberts->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '7496224']);
                $kRoberts->phoneNumbers()->attach($phone->id, ['phone_type_id' => 1]);


//                User account
                $user = $kRoberts->user()->create([
                    'username' => $serviceName,
                    'email'  => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');

//            Medical
                $kRoberts->measurements()->attach(76, ['measured_on' => now()]);
                $kRoberts->weights()->attach(25, ['weighed_on' => now()]);
                $kRoberts->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 1,
                    'skin_colour_id' => 3,
                    'blood_type_id' => 1,
                    'wears_glasses' => 1,
                    'wears_contacts' => 0,
                ]);

//            Service Data
                $kRoberts->enlistments()->create([
                    'enlistment_type_id' => 2,
                    'date' => '2010-03-12',
                    'engagement_period_id' => 1,
                ]);

                JobAppointment::withoutEvents(function () use ($kRoberts) {
                    $kRoberts->jobAppointments()->Create([
                        'job_id' => 5,
                        'started_on' => '2019-01-01',
                        'ended_on' => null,
                    ]);
                });

                $kRoberts->promotions()->attach(11, ['promoted_on' => '2013-03-12', 'substantive_on' => '2013-03-12',]);

                $kRoberts->units()->create([
                    'company_id' => 10,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => '2020-08-01',
                    'posted_on' => null,
                    'left_on' => null,
                ]);


//            Identification
                $kRoberts->militaryIdCard()->create([
                    'number' => '2000593906',
                    'issued_on' => '2020-01-13',
                    'expired_on' => '2023-01-12'
                ]);

                $nationalId = $kRoberts->nationalIdCard()->create([
                    'number' => '19891019023',
                    'date_of_birth' => '1989-10-19',
                    'place_of_birth' => 163,
                    'gender_id' => 1,
                    'issued_on' => '2015-11-20',
                    'expired_on' => '2025-11-20',


                ]);
//            Education
                $kRoberts->servicepersonEducation()->create([
                    'education_level_id' => 7,
                    'subject_id' => 28,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2016-01-01',
                ]);

//              Details
                $currentRankId = $kRoberts->lastPromotion->rank_id;

                $kRoberts->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $kRoberts->currentUnit->id,
                    'job_id' =>  $kRoberts->currentJob->job->id,
                    'career_path_id' => $kRoberts->currentJob->job->careerPath->id,
                    'stream_id' => $kRoberts->currentJob->job->careerPath->stream->id,
                    'branch_id' => $kRoberts->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $kRoberts->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);
            });
        });
    }
}
