<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Serviceperson\Address;
use App\Models\Serviceperson\DriversPermit;
use App\Models\Serviceperson\EmailAddress;
use App\Models\Serviceperson\Enlistment;
use App\Models\Serviceperson\JobAppointment;
use App\Models\Serviceperson\PhoneNumber;
use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\ServicepersonCourse;
use App\Models\Serviceperson\ServicepersonEducation;
use App\Models\Serviceperson\Unit;
use App\Models\System\Universal\Polymorphic\Photo;
use App\Services\ServicepersonServices\RetirementService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RecordCardSeeder extends Seeder
{
    use WithFaker;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Model::unsetEventDispatcher();
//        Serviceperson::withoutEvents(function () {
        DB::transaction(function () {
          $serviceperson =  Serviceperson::factory()->count(100)
                ->hasPhoto()
                ->has(Address::factory()->count(1))
                ->hasBiodata()
                ->hasAttached(EmailAddress::factory()->count(1),
                    ['email_type_id' => random_int(1,2)] )
                ->has(DriversPermit::factory()->count(1))
                ->has(Enlistment::factory()->count(1))
                ->hasMilitaryIdCard()
                ->hasNationalIdCard()
                ->hasPassport()
                ->hasAttached(PhoneNumber::factory()->count(1),
                    ['phone_type_id'=> random_int(1,3)]
                )
                ->has(ServicepersonCourse::factory()->count(3))
                ->has(ServicepersonEducation::factory()->count(3))
                ->has(JobAppointment::factory()->count(1))
                ->has(Unit::factory()->count(1))
                ->create()
                ->each(function($serviceperson){
                    $number = $serviceperson->number;
                    $initial = strtolower(substr($serviceperson->first_name,0,1));
                    $lastName = strtolower($serviceperson->last_name);
                    $serviceName = $number.$initial.$lastName;
                    $user =  $serviceperson->user()->create([
                        'username' => $serviceName,
                        'email' => $serviceName.'@mil.tt',
                        'password' => Hash::make('password'),
                    ]);
                    User::find($user->id)->assignRole('serviceperson');

                    //              Details
                    $currentRankId = $serviceperson->lastPromotion->rank_id;

                    $serviceperson->update([
                        'rank_id' => $currentRankId,
                        'unit_id' => $serviceperson->currentUnit->id,
                        'job_id' =>  $serviceperson->currentJob->job->id,
                        'career_path_id' => $serviceperson->currentJob->job->careerPath->id,
                        'stream_id' => $serviceperson->currentJob->job->careerPath->stream->id,
                        'branch_id' => $serviceperson->currentJob->job->careerPath->stream->branch->id,
                        're_engagement_date' => $serviceperson->lastEnlistment->contract_end ?? null,
                        'crod' => RetirementService::getRetirementDate($currentRankId, $serviceperson->nationalIdCard->date_of_birth),
                    ]);

                });
            });

//        });
    }
}
