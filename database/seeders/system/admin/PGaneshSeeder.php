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

class PGaneshSeeder extends Seeder
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
                $pGanesh = Serviceperson::create(
                    [
                        'formation_id' => 1,
                        'number' => 111,
                        'first_name' => 'Peter',
                        'middle_name' => null,
                        'last_name' => 'Ganesh',
                        'ethnicity_id' => 9,
                        'marital_status_id' => 2,
                        'religion_id' => 8,
                        'serviceperson_status_id' => 1,
                        'sos_on' => null,
                    ]
                );

                $number = $pGanesh->number;
                $initial = strtolower(substr($pGanesh->first_name, 0, 1));
                $lastName = strtolower($pGanesh->last_name);
                $serviceName = $number . $initial . $lastName;

                $pGanesh->photo()->create(['path' => $serviceName . '.jpg']);

//            Contact
                $pGanesh->addresses()->create([
                    'address1' => 'Flagstaff, St James',
                    'address2' => null,
                    'city_or_town_id' => 379,
                ]);

                $email = EmailAddress::create(['email' => 'peter.ganesh@ttdf.mil.tt']);
                $pGanesh->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
                $phone = PhoneNumber::create(['number' => '790-0271']);
                $pGanesh->phoneNumbers()->attach($phone->id, ['phone_type_id' => 1]);

//                User account
                $user = $pGanesh->user()->create([
                    'username' => $serviceName,
                    'email'  => $email->email,
                    'password' => Hash::make('password'),
                ]);

                User::find($user->id)->assignRole('super-admin');

//            Medical
                $pGanesh->measurements()->attach(25, ['measured_on' => now()]);
                $pGanesh->weights()->attach(20, ['weighed_on' => now()]);
                $pGanesh->biodata()->create([
                    'eye_colour_id' => 1,
                    'hair_colour_id' => 2,
                    'skin_colour_id' => 3,
                    'blood_type_id' => 1,
                    'wears_glasses' => 1,
                    'wears_contacts' => 0,
                ]);

//            Service Data
                $pGanesh->enlistments()->create([
                    'enlistment_type_id' => 2,
                    'date' => '1990-08-01',
                    'engagement_period_id' => 6,
                ]);
                JobAppointment::withoutEvents(function () use ($pGanesh) {
                    $pGanesh->jobAppointments()->Create([
                        'job_id' => 1,
                        'started_on' => '2020-08-10',
                        'ended_on' => null,
                    ]);
                });

                $pGanesh->promotions()->attach(15, ['promoted_on' => '2020-08-28', 'substantive_on' => '2020-08-28',]);

                $pGanesh->units()->create([
                    'company_id' => 4,
                    'platoon_id' => null,
                    'section_id' => null,
                    'joined_on' => '2019-01-01',
                    'posted_on' => null,
                    'left_on' => null,
                ]);


//            Identification
                $pGanesh->militaryIdCard()->create([
                    'number' => '19711023001',
                    'issued_on' => '2020-01-01',
                    'expired_on' => '2023-01-01'
                ]);

                $nationalId = $pGanesh->nationalIdCard()->create([
                    'number' => '19711023001',
                    'date_of_birth' => '1977-10-23',
                    'place_of_birth' => 138,
                    'gender_id' => 1,
                    'issued_on' => '2011-08-09',
                    'expired_on' => '2021-08-09'
                ]);
//            Education
                $pGanesh->servicepersonEducation()->create([
                    'education_level_id' => 14,
                    'subject_id' => 28,
                    'education_grade_id' => 1,
                    'school_id' => 190,
                    'completed_on' => '2010-01-01',
                ]);

                //              Details
                $currentRankId = $pGanesh->lastPromotion->rank_id;

                $pGanesh->update([
                    'rank_id' => $currentRankId,
                    'unit_id' => $pGanesh->currentUnit->id,
                    'job_id' =>  $pGanesh->currentJob->job->id,
                    'career_path_id' => $pGanesh->currentJob->job->careerPath->id,
                    'stream_id' => $pGanesh->currentJob->job->careerPath->stream->id,
                    'branch_id' => $pGanesh->currentJob->job->careerPath->stream->branch->id,
                    're_engagement_date' => $pGanesh->lastEnlistment->contract_end ?? null,
                    'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
                ]);
            });
        });
    }
}
