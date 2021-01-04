<?php

namespace Database\Seeders\system\hr;

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

class PDerrySeeder extends Seeder
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
                $pDerry = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 249,
                        'first_name' => 'Petal',
                        'middle_name' => null,
                        'last_name' => 'Derry',
                        'ethnicity_id' => 9,
                        'marital_status_id' => 1,
                        'religion_id' => 9,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $pDerry->number;
                $initial = strtolower(substr($pDerry->first_name, 0, 1));
                $lastName = strtolower($pDerry->last_name);
                $serviceName = $number . $initial . $lastName;

                $pDerry->photo()->create(['path' => $serviceName . '.jpg']);

//            Contact
                $pDerry->addresses()->create([
                    'address1' => 'LP 607, Southern Main Road, Mc Bean',
                    'address2' => null,
                    'city_or_town_id' => 110,
                ]);

                $email = EmailAddress::create(['email' => 'pdderry@hotmail.com']);
                $pDerry->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '7222611']);
                $pDerry->phoneNumbers()->attach($phone->id, ['phone_type_id' => 2]);


//                User account
                $user = $pDerry->user()->create([
                    'username' => $serviceName,
                    'email'  => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');

//            Medical
                $pDerry->measurements()->attach(48, ['measured_on' => now()]);
                $pDerry->weights()->attach(24, ['weighed_on' => now()]);
                $pDerry->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 1,
                    'skin_colour_id' => 5,
                    'blood_type_id' => 1,
                    'wears_glasses' => 1,
                    'wears_contacts' => 0,
                ]);

//            Service Data
                $pDerry->enlistments()->create([
                    'enlistment_type_id' => 2,
                    'date' => '2019-07-26',
                    'engagement_period_id' => 1,
                ]);
                JobAppointment::withoutEvents(function () use ($pDerry) {
                    $pDerry->jobAppointments()->create([
                        'job_id' => 39,
                        'started_on' => now(),
                        'ended_on' => null,
                    ]);
                });

                $pDerry->promotions()->attach(12, ['promoted_on' => '2019-03-25', 'substantive_on' => null,]);

                $pDerry->units()->create([
                    'company_id' => 4,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => now(),
                    'posted_on' => null,
                    'left_on' => null
                ]);


//            Identification
                $pDerry->militaryIdCard()->create([
                    'number' => '2490765901',
                    'issued_on' => now(),
                    'expired_on' => now()->addDays(31)
                ]);

                $nationalId = $pDerry->nationalIdCard()->create([
                    'number' => '19810918058',
                    'date_of_birth' => '1981-09-18',
                    'place_of_birth' => 110,
                    'gender_id' => 2,
                    'issued_on' => '2011-09-11',
                    'expired_on' => '2022-09-11'
                ]);
//            Education
                $pDerry->servicepersonEducation()->create([
                    'education_level_id' => 6,
                    'subject_id' => 47,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2016-01-01',
                ]);

//              Details
                $currentRankId = $pDerry->lastPromotion->rank_id;

                $pDerry->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $pDerry->currentUnit->id,
                    'job_id' =>  $pDerry->currentJob->job->id,
                    'career_path_id' => $pDerry->currentJob->job->careerPath->id,
                    'stream_id' => $pDerry->currentJob->job->careerPath->stream->id,
                    'branch_id' => $pDerry->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $pDerry->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);
            });
        });
    }
}
