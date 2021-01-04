<?php


namespace App\Services\ServicepersonServices;

use App\Models\Serviceperson\Address;
use App\Models\Serviceperson\Dependent;
use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\EmailAddress;
use App\Models\Serviceperson\PhoneNumber;
use App\Models\User;
use App\Models\System\Serviceperson\Biodata\Height;
use App\Models\System\Serviceperson\Biodata\Weight;
use App\Models\System\Serviceperson\Medical\Allergy;
use App\Models\System\Serviceperson\Medical\MedicalCondition;
use App\Models\System\Serviceperson\Medical\Vaccine;
use App\Models\System\Serviceperson\ServiceData\Decoration;
use App\Models\System\Serviceperson\ServiceData\Rank;
use Approval\Models\Modification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StoreServicepersonService
{

    public function store($data)
    {

        DB::transaction(function () use ($data) {
//            Create Serviceperson
            $serviceperson = Serviceperson::create($data['serviceperson']);

//            Save Serviceperson photo path
            $serviceperson->photo()->create(['path' => $data['servicepersonPhoto']]);

//              Address
            $addressData = $data['address'];
            $address = Address::firstOrCreate([
                'address1' => $addressData['address1'],
                'address2' => $addressData['address2'],
                'city_or_town_id' => $addressData['city_or_town_id']
            ])->id;
            $serviceperson->addresses()->attach($address);

//               Phone Number
            foreach ($data['phone'] as $phone_number) {
                $phone_type_id = $phone_number['phone_type_id'];
                $phoneNumber = PhoneNumber::firstOrNew(['number' => $phone_number['number']]);
                $phoneNumber->save();
                $phone_id = $phoneNumber->id;
                $serviceperson->phoneNumbers()->attach($phone_id, ['phone_type_id' => $phone_type_id]);
            }

//                EmailAddress
            foreach ($data['email'] as $email) {
                $email_type_id = $email['email_type_id'];
                $emailAddress = EmailAddress::firstOrNew(['email' => $email['email']]);
                $emailAddress->save();
                $emailAddress_id = $emailAddress->id;
                $serviceperson->emailAddresses()->attach($emailAddress_id, ['email_type_id' => $email_type_id]);
            }

            //            Create Default User login
            $user = $serviceperson->User()->create([
                'username' => $data['serviceName'],
                'email' => $data['email'][0]['email'],
                'password' => Hash::make('Password'),
            ]);

//             Assign basic role when serviceperson is created
            User::find($user->id)->assignRole('serviceperson');


// ********************************************* Identification  *********************************************
//              National Identification Card
            $nationalId = $serviceperson->nationalIdCard()->create($data['national_id']);

//              Drivers Permit
            foreach ($data['drivers_permit'] as $drivers_permit) {
                if ($drivers_permit['number'] != null) {
                    $serviceperson->driversPermits()->create($drivers_permit);
                }
            }

//               Military Id Card
            $serviceperson->militaryIdCard()->create($data['military_id']);

//          Passport
            if ($data['passport']['number'] != null) {
                $serviceperson->passport()->create($data['passport']);
            }

// ********************************************* Service Data *********************************************
//          Enlistment
            foreach ($data['enlistment'] as $enlistment) {
                $serviceperson->enlistments()->create($enlistment);
            }

//                Rank
            foreach ($data['rank'] as $rank) {
                $rank_id = $rank['rank_id'];
                $promoted_on = $rank['promoted_on'];
                $substantive_on = $rank['substantive_on'];
                $serviceperson_rank = Rank::find($rank_id)->id;
                $serviceperson->promotions()->attach($serviceperson_rank, ['promoted_on' => $promoted_on, 'substantive_on' => $substantive_on]);
            }

//                Decoration
            foreach ($data['decoration'] as $decoration) {
                $decoration_id = $decoration['decoration_id'];
                $received_on = $decoration['received_on'];
                if ($decoration['decoration_id'] != null) {
                    $serviceperson_decoration = Decoration::find($decoration_id)->id;
                    $serviceperson->awards()->attach($serviceperson_decoration, ['received_on' => $received_on]);
                }
            }

            //   Serviceperson Job

            foreach ($data['serviceperson_job'] as $job) {
                if ($job['job_id'] != null) {
                    $serviceperson->JobAppointments()->create($job);
                }
            }

//                Unit Data
            foreach ($data['unit'] as $unit) {
                $serviceperson->units()->create($unit);
            }

// ********************************************* Medical Data *********************************************
//                Biodata
            $serviceperson->biodata()->create($data['biodata']);

//                Height
            foreach ($data['height'] as $height) {
                $id = Height::find($height['height_id'])->id;
                $measured_on = $height['measured_on'];
                $serviceperson->measurements()->attach($id, ['measured_on' => $measured_on]);
            }

//                Weight
            foreach ($data['weight'] as $weight) {
                $id = Weight::find($weight['weight_id'])->id;
                $weighed_on = $weight['weighed_on'];
                $serviceperson->weights()->attach($id, ['weighed_on' => $weighed_on]);
            }

//            Medical History
//                Vaccines
            foreach ($data['vaccine'] as $vaccine) {
                if ($vaccine['vaccine_id'] != null) {
                    $id = vaccine::find($vaccine['vaccine_id'])->id;
                    $received_on = $vaccine['received_on'];
                    $place_administered = $vaccine['place_administered'];
                    $serviceperson->vaccines()->attach($id, ['received_on' => $received_on, 'place_administered' => $place_administered]);
                }
            }

//               Allergy
            foreach ($data['allergy'] as $allergy) {
                if ($allergy['allergy_id'] != null) {
                    $id = allergy::find($allergy['allergy_id'])->id;
                    $particulars = $allergy['particulars'];
                    $serviceperson->allergies()->attach($id, ['particulars' => $particulars]);
                }
            }

//                Medical Conditions
            foreach ($data['medical_condition'] as $condition) {
                if ($condition['medical_condition_id'] != null) {
                    $id = MedicalCondition::find($condition['medical_condition_id'])->id;
                    $particulars = $condition['particulars'];
                    $serviceperson->medicalConditions()->attach($id, ['particulars' => $particulars]);
                }
            }

// ********************************************* Qualification  ************************************************

            foreach ($data['education'] as $education) {
                $serviceperson->servicepersonEducation()->create($education);
            }
//                Courses
            foreach ($data['course'] as $course) {
                if ($course['course_type_id'] != null) {
                    $serviceperson->servicepersonCourse()->create($course);
                }
            }

// ********************************************** Extracurricular  *********************************************
//                   Sports
            foreach ($data['sport'] as $servicepersonort) {
                if ($servicepersonort['sport_id'] != null) {
                    $serviceperson->sports()->sync($servicepersonort['sport_id']);
                }
            }

//                    Hobbies
            foreach ($data['hobby'] as $hobby) {
                if ($hobby['hobby_id'] != null) {
                    $serviceperson->hobbies()->sync($hobby['hobby_id']);
                }
            }


// ********************************************* Dependents *********************************************

            foreach ($data['dependent'] as $dataDependent) {
                if ($dataDependent['pin'] != null) {
                    $dependent = Dependent::create($dataDependent);
                    $dependent->photo()->create(['path' => $dataDependent['photo']]);
                    $serviceperson->dependents()->attach($dependent->pin);
                }
            }

// ********************************************* Emergency Contact  *********************************************
            $emergencyContact = $serviceperson->emergencyContacts()->create($data['emergency_contact']);
//
            // Emergency Contact Address
            $addressData = $data['emergency_contact_address'];
            $emergencyContactAddress = Address::firstOrCreate([
                'address1' => $addressData['address1'],
                'address2' => $addressData['address2'],
                'city_or_town_id' => $addressData['city_or_town_id']
            ])->id;
            $emergencyContact->addresses()->attach($emergencyContactAddress);

//             // Emergency Contact Phone Number
            foreach ($data['emergency_contact_phone'] as $phoneNumber) {
                $emergencyContactPhoneTypeId = $phoneNumber['phone_type_id'];
                $emergencyContactNumber = PhoneNumber::firstOrNew(['number' => $phoneNumber['number']]);
                $emergencyContactNumber->save();
                $emergencyContact->phoneNumbers()->attach($emergencyContactNumber->id, ['phone_type_id' => $emergencyContactPhoneTypeId]);
            }

            // Emergency Contact Email Address
            foreach ($data['emergency_contact_email'] as $emailAddress) {
                $emergencyContactEmailTypeId = $emailAddress['email_type_id'];
                $emergencyContactEmailAddress = EmailAddress::firstOrNew(['email' => $emailAddress['email']]);
                $emergencyContactEmailAddress->save();
                $emergencyContact->emailAddresses()->attach($emergencyContactEmailAddress->id, ['email_type_id' => $emergencyContactEmailTypeId]);
            }

            $currentRankId = $serviceperson->lastPromotion->rank_id;
            $serviceperson->update([
                'rank_id' => $currentRankId,
                'unit_id' => $serviceperson->currentUnit->id,
                'job_id' => $serviceperson->currentJob->job->id,
                'career_path_id' => $serviceperson->currentJob->job->careerPath->id,
                'stream_id' => $serviceperson->currentJob->job->careerPath->stream->id,
                'branch_id' => $serviceperson->currentJob->job->careerPath->stream->branch->id,
                're_engagement_date' => $serviceperson->lastEnlistment->contract_end ?? null,
                'crod' => RetirementService::getRetirementDate($currentRankId, $nationalId->date_of_birth),
            ]);

        });


        if (Storage::exists('public/servicepeople/' . $data['servicepersonPhoto'])) {
            Storage::delete('public/servicepeople/' . $data['servicepersonPhoto']);
        }
        Storage::move('public/temp/' . $data['servicepersonPhoto'], 'public/servicepeople/' . $data['servicepersonPhoto']);

        foreach ($data['dependent'] as $dependent) {
            if ($dependent['photo'] != null) {
                if (Storage::exists('public/dependents/' . $dependent['photo'])) {
                    Storage::delete('public/dependents/' . $dependent['photo']);
                }
                Storage::move('public/temp/' . $dependent['photo'], 'public/dependents/' . $dependent['photo']);
            }
        }
    }


}
