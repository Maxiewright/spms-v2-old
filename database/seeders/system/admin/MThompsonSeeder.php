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

class MThompsonSeeder extends Seeder
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
                $mThompson = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 11473,
                        'first_name' => 'Mayon',
                        'middle_name' => 'Kevorn',
                        'last_name' => 'Thompson',
                        'ethnicity_id' => 1,
                        'marital_status_id' => 1,
                        'religion_id' => 10,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $mThompson->number;
                $initial = strtolower(substr($mThompson->first_name, 0, 1));
                $lastName = strtolower($mThompson->last_name);
                $serviceName = $number . $initial . $lastName;

                $mThompson->photo()->create(['path' => $serviceName . '.jpg']);



//            Contact
                $mThompson->addresses()->create([
                    'address1' => 'lp#7 st Lucien Road, Temple Street',
                    'address2' => null,
                    'city_or_town_id' => 134,
                ]);

                $email = EmailAddress::create(['email' => 'mayont024@live.com']);
                $mThompson->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '7801483']);
                $mThompson->phoneNumbers()->attach($phone->id, ['phone_type_id' => 1]);

                // user account
                $user = $mThompson->user()->create([
                    'username' => $serviceName,
                    'email' => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');

//            Medical
                $mThompson->measurements()->attach(25, ['measured_on' => now()]);
                $mThompson->weights()->attach(20, ['weighed_on' => now()]);
                $mThompson->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 1,
                    'skin_colour_id' => 3,
                    'blood_type_id' => 3,
                    'wears_glasses' => 1,
                    'wears_contacts' => 0,
                ]);

//            Service Data
                $mThompson->enlistments()->create([
                    'enlistment_type_id' => 1,
                    'date' => '2005-11-21',
                    'engagement_period_id' => 3,
                ]);

                JobAppointment::withoutEvents(function () use ($mThompson) {
                    $mThompson->jobAppointments()->Create([
                        'job_id' => 6,
                        'started_on' => '2020-05-06',
                        'ended_on' => null,
                    ]);
                });

                $mThompson->promotions()->attach(3, ['promoted_on' => '2013-08-31', 'substantive_on' => '2013-08-31',]);

                $mThompson->units()->create([
                    'company_id' => 9,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => '2005-11-21',
                    'posted_on' => null,
                    'left_on' => null,
                ]);


//            Identification
                $mThompson->militaryIdCard()->create([
                    'number' => '114730108106',
                    'issued_on' => '2005-11-21',
                    'expired_on' => '2021-03-12'
                ]);

               $nationalId = $mThompson->nationalIdCard()->create([
                    'number' => '19870506058',
                    'date_of_birth' => '1987-05-06',
                    'place_of_birth' => 443,
                    'gender_id' => 1,
                    'issued_on' => '2011-08-09',
                    'expired_on' => '2021-08-09'
                ]);
//            Education
                $mThompson->servicepersonEducation()->create([
                    'education_level_id' => 8,
                    'subject_id' => 23,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2016-01-01',
                ]);

                //              Details
                $currentRankId = $mThompson->lastPromotion->rank_id;

                $mThompson->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $mThompson->currentUnit->id,
                    'job_id' =>  $mThompson->currentJob->job->id,
                    'career_path_id' => $mThompson->currentJob->job->careerPath->id,
                    'stream_id' => $mThompson->currentJob->job->careerPath->stream->id,
                    'branch_id' => $mThompson->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $mThompson->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);
            });
        });
    }
}
