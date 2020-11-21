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

class CEllisSeeder extends Seeder
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
                $cEllis = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 197,
                        'first_name' => 'Che',
                        'middle_name' => null,
                        'last_name' => 'Ellis',
                        'ethnicity_id' => 9,
                        'marital_status_id' => 2,
                        'religion_id' => 9,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $cEllis->number;
                $initial = strtolower(substr($cEllis->first_name, 0, 1));
                $lastName = strtolower($cEllis->last_name);
                $serviceName = $number . $initial . $lastName;

                $cEllis->photo()->create(['path' => $serviceName . '.jpg']);

//            Contact
                $cEllis->addresses()->create([
                    'address1' => '10 Lapwing Crescent',
                    'address2' => 'Edinburgh 500',
                    'city_or_town_id' => 82,
                ]);

                $email = EmailAddress::create(['email' => 'che.ellis@ttdf.mil.tt']);
                $cEllis->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '4682716']);
                $cEllis->phoneNumbers()->attach($phone->id, ['phone_type_id' => 1]);

//                User account
                $user = $cEllis->user()->create([
                    'username' => $serviceName,
                    'email'  => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');

//            Medical
                $cEllis->measurements()->attach(50, ['measured_on' => now()]);
                $cEllis->weights()->attach(25, ['weighed_on' => now()]);
                $cEllis->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 1,
                    'skin_colour_id' => 3,
                    'blood_type_id' => 7,
                    'wears_glasses' => 0,
                    'wears_contacts' => 0,
                ]);

//            Service Data
                $cEllis->enlistments()->create([
                    'enlistment_type_id' => 2,
                    'date' => '2009-09-14',
                    'engagement_period_id' => 1,
                ]);

                JobAppointment::withoutEvents(function () use ($cEllis) {
                    $cEllis->jobAppointments()->Create([
                        'job_id' => 7,
                        'started_on' => '2019-01-01',
                        'ended_on' => null,
                    ]);
                });

                $cEllis->promotions()->attach(11, ['promoted_on' => '2012-03-05', 'substantive_on' => '2012-03-05',]);

                $cEllis->units()->create([
                    'company_id' => 11,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => '2018-01-01',
                    'posted_on' => null,
                    'left_on' => null,
                ]);

//            Identification
                $cEllis->militaryIdCard()->create([
                    'number' => '1970422609',
                    'issued_on' => '2019-05-13',
                    'expired_on' => '2022-05-12'
                ]);

                $nationalId = $cEllis->nationalIdCard()->create([
                    'number' => '19871121033',
                    'date_of_birth' => '1987-11-21',
                    'place_of_birth' => 82,
                    'gender_id' => 1,
                    'issued_on' => '2019-04-25',
                    'expired_on' => '2029-04-24'
                ]);
//            Education
                $cEllis->servicepersonEducation()->create([
                    'education_level_id' => 4,
                    'subject_id' => 28,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2008-01-01',
                ]);

                $currentRankId = $cEllis->lastPromotion->rank_id;

                $cEllis->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $cEllis->currentUnit->id,
                    'job_id' =>  $cEllis->currentJob->job->id,
                    'career_path_id' => $cEllis->currentJob->job->careerPath->id,
                    'stream_id' => $cEllis->currentJob->job->careerPath->stream->id,
                    'branch_id' => $cEllis->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $cEllis->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);
            });
        });
    }
}
