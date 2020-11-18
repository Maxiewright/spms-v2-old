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

class CJohnSeeder extends Seeder
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
                $cJohn = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 205,
                        'first_name' => 'Christopher',
                        'middle_name' => null,
                        'last_name' => 'John',
                        'ethnicity_id' => 1,
                        'marital_status_id' => 2,
                        'religion_id' => 8,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $cJohn->number;
                $initial = strtolower(substr($cJohn->first_name, 0, 1));
                $lastName = strtolower($cJohn->last_name);
                $serviceName = $number . $initial . $lastName;

                $cJohn->photo()->create(['path' => $serviceName . '.jpg']);

//            Contact
                $cJohn->addresses()->create([
                    'address1' => 'Cleaver Heights',
                    'address2' => null,
                    'city_or_town_id' => 7,
                ]);

                $email = EmailAddress::create(['email' => 'christopher.john@ttdf.mil.tt']);
                $cJohn->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '7587974']);
                $cJohn->phoneNumbers()->attach($phone->id, ['phone_type_id' => 1]);

//                User account
                $user = $cJohn->user()->create([
                    'username' => $serviceName,
                    'email'  => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');

//            Medical
                $cJohn->measurements()->attach(62, ['measured_on' => now()]);
                $cJohn->weights()->attach(25, ['weighed_on' => now()]);
                $cJohn->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 1,
                    'skin_colour_id' => 4,
                    'blood_type_id' => 7,
                    'wears_glasses' => 0,
                    'wears_contacts' => 0,
                ]);

//            Service Data
                $cJohn->enlistments()->create([
                    'enlistment_type_id' => 2,
                    'date' => '1995-12-15',
                    'engagement_period_id' => 1,
                ]);

                JobAppointment::withoutEvents(function () use ($cJohn) {
                    $cJohn->jobAppointments()->Create([
                        'job_id' => 25,
                        'started_on' => '2015-01-01',
                        'ended_on' => null,
                    ]);
                });

                $cJohn->promotions()->attach(12, ['promoted_on' => '2015-01-01', 'substantive_on' => '2015-01-01',]);

                $cJohn->units()->create([
                    'company_id' => 4,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => '2015-01-01',
                    'posted_on' => null,
                    'left_on' => null,
                ]);


//            Identification
                $cJohn->militaryIdCard()->create([
                    'number' => '2050234311',
                    'issued_on' => '2019-08-19',
                    'expired_on' => '2022-08-22'
                ]);

                $nationalId = $cJohn->nationalIdCard()->create([
                    'number' => '19770103018',
                    'date_of_birth' => '1977-01-03',
                    'place_of_birth' => 7,
                    'gender_id' => 1,
                    'issued_on' => '2018-01-28',
                    'expired_on' => '2028-01-28'
                ]);
//            Education
                $cJohn->servicepersonEducation()->create([
                    'education_level_id' => 8,
                    'subject_id' => 23,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2010-01-01',
                ]);

                $currentRankId = $cJohn->lastPromotion->rank_id;

                $cJohn->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $cJohn->currentUnit->id,
                    'job_id' =>  $cJohn->currentJob->job->id,
                    'career_path_id' => $cJohn->currentJob->job->careerPath->id,
                    'stream_id' => $cJohn->currentJob->job->careerPath->stream->id,
                    'branch_id' => $cJohn->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $cJohn->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);

            });
        });
    }
}
