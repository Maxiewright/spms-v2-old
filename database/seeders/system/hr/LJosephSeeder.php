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

class LJosephSeeder extends Seeder
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
                $lJoseph = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 12745,
                        'first_name' => 'La-Teisha',
                        'middle_name' => null,
                        'last_name' => 'Joseph',
                        'ethnicity_id' => 1,
                        'marital_status_id' => 1,
                        'religion_id' => 8,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $lJoseph->number;
                $initial = strtolower(substr($lJoseph->first_name, 0, 1));
                $lastName = strtolower($lJoseph->last_name);
                $serviceName = $number . $initial . $lastName;

                $lJoseph->photo()->create(['path' => $serviceName . '.jpg']);

//            Contact
                $lJoseph->addresses()->create([
                    'address1' => 'Lp52 Ash Street',
                    'address2' => null,
                    'city_or_town_id' => 134,
                ]);

                $email = EmailAddress::create(['email' => 'tije.ah@gmail.com']);
                $lJoseph->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '2782025']);
                $lJoseph->phoneNumbers()->attach($phone->id, ['phone_type_id' => 2]);


//                User account
                $user = $lJoseph->user()->create([
                    'username' => $serviceName,
                    'email' => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');

//            Medical
                $lJoseph->measurements()->attach(46, ['measured_on' => now()]);
                $lJoseph->weights()->attach(17, ['weighed_on' => now()]);
                $lJoseph->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 1,
                    'skin_colour_id' => 3,
                    'blood_type_id' => 5,
                    'wears_glasses' => 0,
                    'wears_contacts' => 0,
                ]);

//            Service Data
                $lJoseph->enlistments()->create([
                    'enlistment_type_id' => 1,
                    'date' => '2007-03-01',
                    'engagement_period_id' => 1,
                ]);
                JobAppointment::withoutEvents(function () use ($lJoseph) {
                    $lJoseph->jobAppointments()->create([
                        'job_id' => 44,
                        'started_on' => now(),
                        'ended_on' => null,
                    ]);
                });

                $lJoseph->promotions()->attach(2, ['promoted_on' => '2019-03-25', 'substantive_on' => null,]);

                $lJoseph->units()->create([
                    'company_id' => 4,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => now(),
                    'posted_on' => null,
                    'left_on' => null
                ]);


//            Identification
                $lJoseph->militaryIdCard()->create([
                    'number' => '127450664804',
                    'issued_on' => '2019-12-18',
                    'expired_on' => now()->addDays(31)
                ]);

                $nationalId = $lJoseph->nationalIdCard()->create([
                    'number' => '19920511007',
                    'date_of_birth' => '1992-05-11',
                    'place_of_birth' => 163,
                    'gender_id' => 2,
                    'issued_on' => now(),
                    'expired_on' => now()->addDays(31)
                ]);
//            Education
                $lJoseph->servicepersonEducation()->create([
                    'education_level_id' => 6,
                    'subject_id' => 47,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2016-01-01',
                ]);

//              Details
                $currentRankId = $lJoseph->lastPromotion->rank_id;

                $lJoseph->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $lJoseph->currentUnit->id,
                    'job_id' => $lJoseph->currentJob->job->id,
                    'career_path_id' => $lJoseph->currentJob->job->careerPath->id,
                    'stream_id' => $lJoseph->currentJob->job->careerPath->stream->id,
                    'branch_id' => $lJoseph->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $lJoseph->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);
            });
        });
    }
}
