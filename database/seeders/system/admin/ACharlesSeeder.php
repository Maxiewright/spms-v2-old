<?php
namespace Database\Seeders\system\admin;

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

class ACharlesSeeder extends Seeder
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
                $aCharles = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 11313,
                        'first_name' => 'Aaron',
                        'middle_name' => 'Hutson',
                        'last_name' => 'Charles',
                        'ethnicity_id' => 1,
                        'marital_status_id' => 2,
                        'religion_id' => 12,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $aCharles->number;
                $initial = strtolower(substr($aCharles->first_name, 0, 1));
                $lastName = strtolower($aCharles->last_name);
                $serviceName = $number . $initial . $lastName;

                $aCharles->photo()->create(['path' => $serviceName . '.jpg']);

//            Contact
                $aCharles->addresses()->create([
                    'address1' => '#164 Archibald Hinds Phase 4 Malabar',
                    'address2' => null,
                    'city_or_town_id' => 7,
                ]);

                $email = EmailAddress::create(['email' => 'aaron11313@hotmail.com']);
                $aCharles->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '3590768']);
                $aCharles->phoneNumbers()->attach($phone->id, ['phone_type_id' => 1]);

                //                User account
                $user = $aCharles->user()->create([
                    'username' => $serviceName,
                    'email'  => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');

//            Medical
                $aCharles->measurements()->attach(25, ['measured_on' => now()]);
                $aCharles->weights()->attach(20, ['weighed_on' => now()]);
                $aCharles->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 1,
                    'skin_colour_id' => 3,
                    'blood_type_id' => 3,
                    'wears_glasses' => 1,
                    'wears_contacts' => 0,
                ]);

//            Service Data
                $aCharles->enlistments()->create([
                    'enlistment_type_id' => 1,
                    'date' => '2005-11-21',
                    'engagement_period_id' => 3,
                ]);

                JobAppointment::withoutEvents(function () use ($aCharles) {
                    $aCharles->jobAppointments()->Create([
                        'job_id' => 6,
                        'started_on' => '2020-05-06',
                        'ended_on' => null,
                    ]);
                });

                $aCharles->promotions()->attach(3, ['promoted_on' => '2014-08-31', 'substantive_on' => '2014-08-31']);

                $aCharles->units()->create([
                    'company_id' => 9,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => '2005-11-21',
                    'posted_on' => null,
                    'left_on' => null,
                ]);


//            Identification
                $aCharles->militaryIdCard()->create([
                    'number' => '19870514038',
                    'issued_on' => '2005-11-21',
                    'expired_on' => '2020-06-13'
                ]);

               $nationalId = $aCharles->nationalIdCard()->create([
                    'number' => '19870514038',
                    'date_of_birth' => '1987-05-14',
                    'place_of_birth' => 379,
                    'gender_id' => 1,
                    'issued_on' => '2019-08-20',
                    'expired_on' => '2029-08-20'
                ]);
//            Education
                $aCharles->servicepersonEducation()->create([
                    'education_level_id' => 6,
                    'subject_id' => 23,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2016-01-01',
                ]);

                $currentRankId = $aCharles->lastPromotion->rank_id;

                $aCharles->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $aCharles->currentUnit->id,
                    'job_id' =>  $aCharles->currentJob->job->id,
                    'career_path_id' => $aCharles->currentJob->job->careerPath->id,
                    'stream_id' => $aCharles->currentJob->job->careerPath->stream->id,
                    'branch_id' => $aCharles->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $aCharles->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);
            });
        });
    }
}
