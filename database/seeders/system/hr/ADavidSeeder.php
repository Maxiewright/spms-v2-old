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

class ADavidSeeder extends Seeder
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
                $aDavid = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 250,
                        'first_name' => 'Addison',
                        'middle_name' => null,
                        'last_name' => 'David',
                        'ethnicity_id' => 1,
                        'marital_status_id' => 1,
                        'religion_id' => 9,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $aDavid->number;
                $initial = strtolower(substr($aDavid->first_name, 0, 1));
                $lastName = strtolower($aDavid->last_name);
                $serviceName = $number . $initial . $lastName;

                $aDavid->photo()->create(['path' => $serviceName . '.jpg']);

//            Contact
                $aDavid->addresses()->create([
                    'address1' => ' somewhere home',
                    'address2' => null,
                    'city_or_town_id' => 94,
                ]);

                $email = EmailAddress::create(['email' => 'addison.david@ttdf.mil.tt']);
                $aDavid->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '7222650']);
                $aDavid->phoneNumbers()->attach($phone->id, ['phone_type_id' => 2]);


//                User account
                $user = $aDavid->user()->create([
                    'username' => $serviceName,
                    'email'  => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('hro');

//            Medical
                $aDavid->measurements()->attach(49, ['measured_on' => now()]);
                $aDavid->weights()->attach(24, ['weighed_on' => now()]);
                $aDavid->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 1,
                    'skin_colour_id' => 5,
                    'blood_type_id' => 7,
                    'wears_glasses' => 1,
                    'wears_contacts' => 0,
                ]);

//            Service Data
                $aDavid->enlistments()->create([
                    'enlistment_type_id' => 2,
                    'date' => '2019-07-26',
                    'engagement_period_id' => 1,
                ]);
                JobAppointment::withoutEvents(function () use ($aDavid) {
                    $aDavid->jobAppointments()->create([
                            'job_id' => 6,
                            'started_on' => '2020-05-06',
                            'ended_on' => null,
                    ]);
                });

                $aDavid->promotions()->attach(12, ['promoted_on' => '2019-03-25', 'substantive_on' => null,]);

                $aDavid->units()->create([
                    'company_id' => 4,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => now(),
                    'posted_on' => null,
                    'left_on' => null
                ]);


//            Identification
                $aDavid->militaryIdCard()->create([
                    'number' => '02500766001',
                    'issued_on' => now(),
                    'expired_on' => now()->addDays(31)
                ]);

                $nationalId = $aDavid->nationalIdCard()->create([
                    'number' => '19870624015',
                    'date_of_birth' => '1987-06-24',
                    'place_of_birth' => 163,
                    'gender_id' => 1,
                    'issued_on' => '2014-05-13',
                    'expired_on' => '2022-09-13'
                ]);
//            Education
                $aDavid->servicepersonEducation()->create([
                    'education_level_id' => 6,
                    'subject_id' => 47,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2016-01-01',
                ]);

//              Details
                $currentRankId = $aDavid->lastPromotion->rank_id;

                $aDavid->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $aDavid->currentUnit->id,
                    'job_id' =>  $aDavid->currentJob->job->id,
                    'career_path_id' => $aDavid->currentJob->job->careerPath->id,
                    'stream_id' => $aDavid->currentJob->job->careerPath->stream->id,
                    'branch_id' => $aDavid->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $aDavid->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);
            });
        });
    }
}
