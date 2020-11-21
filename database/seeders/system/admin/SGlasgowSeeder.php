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

class SGlasgowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unsetEventDispatcher();
        DB::transaction(function () {
            Serviceperson::withoutEvents(function () {
                $sGlasgow = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 199,
                        'first_name' => 'Silvon',
                        'middle_name' => 'Augustus',
                        'last_name' => 'Glasgow',
                        'ethnicity_id' => 1,
                        'marital_status_id' => 1,
                        'religion_id' => 8,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $sGlasgow->number;
                $initial = strtolower(substr($sGlasgow->first_name, 0, 1));
                $lastName = strtolower($sGlasgow->last_name);
                $serviceName = $number . $initial . $lastName;

                $sGlasgow->photo()->create(['path' => $serviceName . '.jpg']);

//            Contact
                $sGlasgow->addresses()->create([
                    'address1' => '75C First Crescent',
                    'address2' => 'Oropune Gardens',
                    'city_or_town_id' => 359,
                ]);

                $email = EmailAddress::create(['email' => 'saglasgow13@live.com']);
                $sGlasgow->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '4682707']);
                $sGlasgow->phoneNumbers()->attach($phone->id, ['phone_type_id' => 1]);


//                User account
                $user = $sGlasgow->user()->create([
                    'username' => $serviceName,
                    'email'  => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');

//            Medical
                $sGlasgow->measurements()->attach(50, ['measured_on' => now()]);
                $sGlasgow->weights()->attach(25, ['weighed_on' => now()]);
                $sGlasgow->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 1,
                    'skin_colour_id' => 3,
                    'blood_type_id' => 1,
                    'wears_glasses' => 0,
                    'wears_contacts' => 0,
                ]);

//            Service Data
                $sGlasgow->enlistments()->create([
                    'enlistment_type_id' => 2,
                    'date' => '2009-09-14',
                    'engagement_period_id' => 1,
                ]);

                JobAppointment::withoutEvents(function () use ($sGlasgow) {
                    $sGlasgow->jobAppointments()->Create([
                        'job_id' => 7,
                        'started_on' => '2019-01-01',
                        'ended_on' => null,
                    ]);
                });

                $sGlasgow->promotions()->attach(11, ['promoted_on' => '2012-03-05', 'substantive_on' => '2012-03-05',]);

                $sGlasgow->units()->create([
                    'company_id' => 10,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => '2018-01-01',
                    'posted_on' => null,
                    'left_on' => null,
                ]);


//            Identification
                $sGlasgow->militaryIdCard()->create([
                    'number' => '1990422609',
                    'issued_on' => '2019-05-13',
                    'expired_on' => '2022-05-12'
                ]);

                $nationalId = $sGlasgow->nationalIdCard()->create([
                    'number' => '19861002055',
                    'date_of_birth' => '1986-10-02',
                    'place_of_birth' => 308,
                    'gender_id' => 1,
                    'issued_on' => '2019-04-25',
                    'expired_on' => '2029-04-24'
                ]);
//            Education
                $sGlasgow->servicepersonEducation()->create([
                    'education_level_id' => 4,
                    'subject_id' => 63,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2019-01-01',
                ]);

                //              Details
                $currentRankId = $sGlasgow->lastPromotion->rank_id;

                $sGlasgow->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $sGlasgow->currentUnit->id,
                    'job_id' =>  $sGlasgow->currentJob->job->id,
                    'career_path_id' => $sGlasgow->currentJob->job->careerPath->id,
                    'stream_id' => $sGlasgow->currentJob->job->careerPath->stream->id,
                    'branch_id' => $sGlasgow->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $sGlasgow->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);
            });
        });
    }
}
