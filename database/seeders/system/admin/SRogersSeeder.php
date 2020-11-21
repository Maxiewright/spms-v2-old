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

class SRogersSeeder extends Seeder
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
                $sRogers = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 13374,
                        'first_name' => 'Samuel',
                        'middle_name' => null,
                        'last_name' => 'Rogers',
                        'ethnicity_id' => 9,
                        'marital_status_id' => 1,
                        'religion_id' => 9,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $sRogers->number;
                $initial = strtolower(substr($sRogers->first_name, 0, 1));
                $lastName = strtolower($sRogers->last_name);
                $serviceName = $number . $initial . $lastName;

                $sRogers->photo()->create(['path' => $serviceName . '.jpg']);

//            Contact
                $sRogers->addresses()->create([
                    'address1' => '2A Recreation Ground Road',
                    'address2' => null,
                    'city_or_town_id' => 138,
                ]);

                $email = EmailAddress::create(['email' => 'samuelrogers1234@gmail.com']);
                $sRogers->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '7368638']);
                $sRogers->phoneNumbers()->attach($phone->id, ['phone_type_id' => 2]);


//                User account
                $user = $sRogers->user()->create([
                    'username' => $serviceName,
                    'email'  => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');

//            Medical
                $sRogers->measurements()->attach(25, ['measured_on' => now()]);
                $sRogers->weights()->attach(22, ['weighed_on' => now()]);
                $sRogers->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 1,
                    'skin_colour_id' => 4,
                    'blood_type_id' => 7,
                    'wears_glasses' => 0,
                    'wears_contacts' => 0,
                ]);

//            Service Data
                $sRogers->enlistments()->create([
                    'enlistment_type_id' => 2,
                    'date' => '2019-03-25',
                    'engagement_period_id' => 1,
                ]);
                JobAppointment::withoutEvents(function () use ($sRogers) {
                    $sRogers->jobAppointments()->create([
                            'job_id' => 6,
                            'started_on' => '2020-05-06',
                            'ended_on' => null,]
                    );
                });

                $sRogers->promotions()->attach(9, ['promoted_on' => '2019-03-25', 'substantive_on' => null,]);

                $sRogers->units()->create([
                    'company_id' => 6,
                    'platoon_id' => 8,
                    'section_id' => null,
                    'joined_on' => '2020-03-11',
                    'posted_on' => null,
                    'left_on' => null,
                ]);


//            Identification
                $sRogers->militaryIdCard()->create([
                    'number' => '133740765001',
                    'issued_on' => '2019-07-23',
                    'expired_on' => '2022-07-10'
                ]);

                $nationalId = $sRogers->nationalIdCard()->create([
                    'number' => '19950905045',
                    'date_of_birth' => '1995-09-05',
                    'place_of_birth' => 163,
                    'gender_id' => 1,
                    'issued_on' => '2012-09-03',
                    'expired_on' => '2022-09-13'
                ]);
//            Education
                $sRogers->servicepersonEducation()->create([
                    'education_level_id' => 5,
                    'subject_id' => 42,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2020-12-01',
                ]);

//              Details
                $currentRankId = $sRogers->lastPromotion->rank_id;

                $sRogers->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $sRogers->currentUnit->id,
                    'job_id' =>  $sRogers->currentJob->job->id,
                    'career_path_id' => $sRogers->currentJob->job->careerPath->id,
                    'stream_id' => $sRogers->currentJob->job->careerPath->stream->id,
                    'branch_id' => $sRogers->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $sRogers->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);
            });
        });
    }
}
