<?php
namespace Database\Seeders\service_data\serviceperson_job;

use Database\Seeders\service_data\serviceperson_job\job_title\AdminAndPersonnelJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\AdvisoryJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\CommandJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\EngineerJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\ICTJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\InfantryJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\IntelligenceJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\LogsAndFinanceJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\MaintainanceJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\MedicalJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\MessingJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\MuscialJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\OpsAndTrgJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\PRJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\ProjectsJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\QuartermasterJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\SpecialForcesJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\SupplyServicesJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\SupportWeaponsJobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\job_title\TransportJobTitleSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function (){
            $this->call([
                JobTitleCategorySeeder::class,
                CommandJobTitleSeeder::class,
                AdvisoryJobTitleSeeder::class,
                AdminAndPersonnelJobTitleSeeder::class,
                EngineerJobTitleSeeder::class,
                ICTJobTitleSeeder::class,
                InfantryJobTitleSeeder::class,
                IntelligenceJobTitleSeeder::class,
                LogsAndFinanceJobTitleSeeder::class,
                MaintainanceJobTitleSeeder::class,
                MedicalJobTitleSeeder::class,
                MessingJobTitleSeeder::class,
                MuscialJobTitleSeeder::class,
                OpsAndTrgJobTitleSeeder::class,
                PRJobTitleSeeder::class,
                ProjectsJobTitleSeeder::class,
                QuartermasterJobTitleSeeder::class,
                SpecialForcesJobTitleSeeder::class,
                SupplyServicesJobTitleSeeder::class,
                SupportWeaponsJobTitleSeeder::class,
                TransportJobTitleSeeder::class,
            ]);
        });

    }
}
