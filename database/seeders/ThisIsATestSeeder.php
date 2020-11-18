<?php
namespace Database\Seeders;

use App\Models\Authentication\User;
use App\Models\Serviceperson\EmailAddress;
use App\Models\Serviceperson\JobAppointment;
use App\Models\Serviceperson\PhoneNumber;
use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ThisIsATestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {

            $aNewPerson = Serviceperson::create(
                [
                    'formation_id' => 1,
                    'number'=> 10000,
                    'first_name' => 'This',
                    'middle_name' => 'is',
                    'last_name' => 'AhNewPerson',
                    'ethnicity_id' => 1,
                    'marital_status_id' => 2,
                    'religion_id' => 12,
                    'serviceperson_status_id' => 1,
                    'sos_on' => null,
                ]
            );

            $number = $aNewPerson->number;
            $initial = strtolower(substr($aNewPerson->first_name,0,1));
            $lastName = strtolower($aNewPerson->last_name);
            $serviceName = $number.$initial.$lastName;

            $aNewPerson->photo()->create(['path' => $serviceName.'.jpg']);

            $user = $aNewPerson->user()->create([
                'username' => $serviceName,
                'password' => Hash::make('password'),
            ]);

            User::find($user->id)->assignRole('super-admin');

//            Contact
            $aNewPerson->addresses()->create([
                'address1' => '#164 Archibald Hinds Phase 4 Malabar',
                'address2' => null,
                'city_or_town_id' => 7,
            ]);

            $email = EmailAddress::updateOrCreate(['email' => 'aaron11313@hotmail.com']);
            $aNewPerson->emailAddresses()->attach($email->id, ['email_type_id' => 1]);
            $phone = PhoneNumber::updateOrCreate(['number' => '3590768']);
            $aNewPerson->phoneNumbers()->attach($phone->id, ['phone_type_id'=> 1]);

//            Medical
            $aNewPerson->measurements()->attach(25, ['measured_on' => now()]);
            $aNewPerson->weights()->attach(20, ['weighed_on' => now()]);
            $aNewPerson->biodata()->create([
                'eye_colour_id' => 1,
                'hair_colour_id'=>  1,
                'skin_colour_id' => 3,
                'blood_type_id' => 3,
                'wears_glasses' => 1,
                'wears_contacts' => 0,
            ]);

//            Service Data
            $aNewPerson->enlistments()->create([
                'enlistment_type_id' => 1,
                'date' => '2005-11-21',
                'engagement_period_id' => 3,
            ]);

            JobAppointment::withoutEvents(function ()use ($aNewPerson){
                $aNewPerson->jobAppointments()->Create([
                    'job_id' => 6,
                    'started_on' => '2020-05-06',
                    'ended_on' => null,
                ]);
            });

            $aNewPerson->promotions()->attach(11, ['promoted_on' => '2014-08-31', 'substantive_on' => '2014-08-31',]);

            $aNewPerson->units()->create([
                'company_id' => 9,
                'platoon_id' => null,
                'section_id' => null,
                'joined_on' => '2005-11-21',
                'posted_on' => null,
                'left_on' => null,


            ]);


//            Identification
            $aNewPerson->militaryIdCard()->create([
                'number' => '19000514038',
                'issued_on' => '2005-11-21',
                'expired_on' => '2020-06-13'
            ]);

            $aNewPerson->nationalIdCard()->create([
                'number' => '19000514038',
                'date_of_birth' => '1987-05-14',
                'place_of_birth' => 379,
                'gender_id' => 1,
                'issued_on' => '2019-08-20',
                'expired_on' => '2029-08-20'
            ]);
//            Education
            $aNewPerson->servicepersonEducation()->create([
                'education_level_id' => 6,
                'subject_id' => 23,
                'education_grade_id' => 1,
                'school_id' => 190,
                'completed_on' => '2016-01-01',


            ]);

        });
    }
}
