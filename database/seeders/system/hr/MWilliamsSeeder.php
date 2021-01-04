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

class MWilliamsSeeder extends Seeder
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
                $mFrancis = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 11706,
                        'first_name' => 'Malissa',
                        'middle_name' => 'Andra',
                        'last_name' => 'Williams-Francis',
                        'ethnicity_id' => 1,
                        'marital_status_id' => 2,
                        'religion_id' => 8,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $mFrancis->number;
                $initial = strtolower(substr($mFrancis->first_name, 0, 1));
                $lastName = strtolower($mFrancis->last_name);
                $serviceName = $number . $initial . $lastName;

                $mFrancis->photo()->create(['path' => $serviceName . '.jpg']);

//            Contact
                $mFrancis->addresses()->create([
                    'address1' => 'Readymix Private Road',
                    'address2' => null,
                    'city_or_town_id' => 359,
                ]);

                $email = EmailAddress::create(['email' => 'williamsmoly@gmail.com']);
                $mFrancis->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '4661136']);
                $mFrancis->phoneNumbers()->attach($phone->id, ['phone_type_id' => 2]);


//                User account
                $user = $mFrancis->user()->create([
                    'username' => $serviceName,
                    'email'  => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');

//            Medical
                $mFrancis->measurements()->attach(35, ['measured_on' => now()]);
                $mFrancis->weights()->attach(24, ['weighed_on' => now()]);
                $mFrancis->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 1,
                    'skin_colour_id' => 3,
                    'blood_type_id' => 7,
                    'wears_glasses' => 0,
                    'wears_contacts' => 0,
                ]);

//            Service Data
                $mFrancis->enlistments()->create([
                    'enlistment_type_id' => 1,
                    'date' => '2006-04-07',
                    'engagement_period_id' => 1,
                ]);
                JobAppointment::withoutEvents(function () use ($mFrancis) {
                    $mFrancis->jobAppointments()->create([
                        'job_id' => 44,
                        'started_on' => now(),
                        'ended_on' => null,
                    ]);
                });

                $mFrancis->promotions()->attach(3, ['promoted_on' => '2019-03-25', 'substantive_on' => null,]);

                $mFrancis->units()->create([
                    'company_id' => 4,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => now(),
                    'posted_on' => null,
                    'left_on' => null
                ]);


//            Identification
                $mFrancis->militaryIdCard()->create([
                    'number' => 117060664804,
                    'issued_on' => now(),
                    'expired_on' => now()->addDays(31)
                ]);

                $nationalId = $mFrancis->nationalIdCard()->create([
                    'number' => '19860518040',
                    'date_of_birth' => '1986-05-18',
                    'place_of_birth' => 163,
                    'gender_id' => 2,
                    'issued_on' => now(),
                    'expired_on' => now()->addDays(31)
                ]);
//            Education
                $mFrancis->servicepersonEducation()->create([
                    'education_level_id' => 6,
                    'subject_id' => 47,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2016-01-01',
                ]);

//              Details
                $currentRankId = $mFrancis->lastPromotion->rank_id;

                $mFrancis->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $mFrancis->currentUnit->id,
                    'job_id' =>  $mFrancis->currentJob->job->id,
                    'career_path_id' => $mFrancis->currentJob->job->careerPath->id,
                    'stream_id' => $mFrancis->currentJob->job->careerPath->stream->id,
                    'branch_id' => $mFrancis->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $mFrancis->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);
            });
        });
    }
}
