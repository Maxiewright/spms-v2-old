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

class NAmingSeeder extends Seeder
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
                $nAming = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 9585,
                        'first_name' => 'Nicole',
                        'middle_name' => null,
                        'last_name' => 'Aming',
                        'ethnicity_id' => 9,
                        'marital_status_id' => 2,
                        'religion_id' => 12,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $nAming->number;
                $initial = strtolower(substr($nAming->first_name, 0, 1));
                $lastName = strtolower($nAming->last_name);
                $serviceName = $number . $initial . $lastName;

                $nAming->photo()->create(['path' => $serviceName . '.jpg']);

//            Contact
                $nAming->addresses()->create([
                    'address1' => '#18, Passiflora Drive Phase 6B Roystonia',
                    'address2' => null,
                    'city_or_town_id' => 168,
                ]);

                $email = EmailAddress::create(['email' => 'nicoledixon440.com']);
                $nAming->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '7075649']);
                $nAming->phoneNumbers()->attach($phone->id, ['phone_type_id' => 2]);


//                User account
                $user = $nAming->user()->create([
                    'username' => $serviceName,
                    'email'  => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');

//            Medical
                $nAming->measurements()->attach(56, ['measured_on' => now()]);
                $nAming->weights()->attach(24, ['weighed_on' => now()]);
                $nAming->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 1,
                    'skin_colour_id' => 5,
                    'blood_type_id' => 3,
                    'wears_glasses' => 1,
                    'wears_contacts' => 0,
                ]);

//            Service Data
                $nAming->enlistments()->create([
                    'enlistment_type_id' => 1,
                    'date' => '1998-01-15',
                    'engagement_period_id' => 1,
                ]);
                JobAppointment::withoutEvents(function () use ($nAming) {
                    $nAming->jobAppointments()->create([
                        'job_id' => 43,
                        'started_on' => now(),
                        'ended_on' => null,
                    ]);
                });

                $nAming->promotions()->attach(6, ['promoted_on' => '2019-03-25', 'substantive_on' => null,]);

                $nAming->units()->create([
                    'company_id' => 4,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => now(),
                    'posted_on' => null,
                    'left_on' => null
                ]);


//            Identification
                $nAming->militaryIdCard()->create([
                    'number' => 95850664804,
                    'issued_on' => now(),
                    'expired_on' => now()->addDays(31)
                ]);

                $nationalId = $nAming->nationalIdCard()->create([
                    'number' => '19751222057',
                    'date_of_birth' => '1975-12-22',
                    'place_of_birth' => 163,
                    'gender_id' => 2,
                    'issued_on' => now(),
                    'expired_on' => now()->addDays(31)
                ]);
//            Education
                $nAming->servicepersonEducation()->create([
                    'education_level_id' => 6,
                    'subject_id' => 47,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2016-01-01',
                ]);

//              Details
                $currentRankId = $nAming->lastPromotion->rank_id;

                $nAming->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $nAming->currentUnit->id,
                    'job_id' =>  $nAming->currentJob->job->id,
                    'career_path_id' => $nAming->currentJob->job->careerPath->id,
                    'stream_id' => $nAming->currentJob->job->careerPath->stream->id,
                    'branch_id' => $nAming->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $nAming->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);
            });
        });
    }
}
