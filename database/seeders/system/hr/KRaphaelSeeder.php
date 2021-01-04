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

class KRaphaelSeeder extends Seeder
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
                $kRaphael = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 11872,
                        'first_name' => 'Keelon',
                        'middle_name' => null,
                        'last_name' => 'Raphael',
                        'ethnicity_id' => 1,
                        'marital_status_id' => 1,
                        'religion_id' => 1,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $kRaphael->number;
                $initial = strtolower(substr($kRaphael->first_name, 0, 1));
                $lastName = strtolower($kRaphael->last_name);
                $serviceName = $number . $initial . $lastName;

                $kRaphael->photo()->create(['path' => $serviceName . '.jpg']);

//            Contact
                $kRaphael->addresses()->create([
                    'address1' => '#12 Fourth Streer West Montague Avenue Trincity',
                    'address2' => null,
                    'city_or_town_id' => 9,
                ]);

                $email = EmailAddress::create(['email' => 'keelonraphael@gmail.com']);
                $kRaphael->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '7203137']);
                $kRaphael->phoneNumbers()->attach($phone->id, ['phone_type_id' => 2]);


//                User account
                $user = $kRaphael->user()->create([
                    'username' => $serviceName,
                    'email'  => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');

//            Medical
                $kRaphael->measurements()->attach(57, ['measured_on' => now()]);
                $kRaphael->weights()->attach(24, ['weighed_on' => now()]);
                $kRaphael->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 1,
                    'skin_colour_id' => 3,
                    'blood_type_id' => 7,
                    'wears_glasses' => 0,
                    'wears_contacts' => 0,
                ]);

//            Service Data
                $kRaphael->enlistments()->create([
                    'enlistment_type_id' => 1,
                    'date' => '2007-03-01',
                    'engagement_period_id' => 1,
                ]);
                JobAppointment::withoutEvents(function () use ($kRaphael) {
                    $kRaphael->jobAppointments()->create([
                            'job_id' => 44,
                            'started_on' => now(),
                            'ended_on' => null,
                    ]);
                });

                $kRaphael->promotions()->attach(3, ['promoted_on' => '2019-03-25', 'substantive_on' => null,]);

                $kRaphael->units()->create([
                    'company_id' => 4,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => now(),
                    'posted_on' => null,
                    'left_on' => null
                ]);


//            Identification
                $kRaphael->militaryIdCard()->create([
                    'number' => '118720427405',
                    'issued_on' => '2018-03-27',
                    'expired_on' => now()->addDays(31)
                ]);

                $nationalId = $kRaphael->nationalIdCard()->create([
                    'number' => '19880504040',
                    'date_of_birth' => '1988-05-04',
                    'place_of_birth' => 163,
                    'gender_id' => 1,
                    'issued_on' => '2018-03-27',
                    'expired_on' => now()->addDays(31)
                ]);
//            Education
                $kRaphael->servicepersonEducation()->create([
                    'education_level_id' => 6,
                    'subject_id' => 47,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2016-01-01',
                ]);

//              Details
                $currentRankId = $kRaphael->lastPromotion->rank_id;

                $kRaphael->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $kRaphael->currentUnit->id,
                    'job_id' =>  $kRaphael->currentJob->job->id,
                    'career_path_id' => $kRaphael->currentJob->job->careerPath->id,
                    'stream_id' => $kRaphael->currentJob->job->careerPath->stream->id,
                    'branch_id' => $kRaphael->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $kRaphael->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);
            });
        });
    }
}
