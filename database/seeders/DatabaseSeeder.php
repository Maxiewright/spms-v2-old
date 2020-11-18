<?php

namespace Database\Seeders;

use Database\Seeders\look_ups\LookUpSeeder;
use Database\Seeders\medical\BiodataSeeder;
use Database\Seeders\medical\MedicalClassificationGradeSeeder;
use Database\Seeders\medical\MedicalHistorySeeder;
use Database\Seeders\medical\MedicalSeeder;
use Database\Seeders\qualification\QualificationSeeder;
use Database\Seeders\service_data\EngagementPeriodSeeder;
use Database\Seeders\service_data\RankSeeder;
use Database\Seeders\service_data\ReEngagementPeriodsSeeder;
use Database\Seeders\service_data\ServiceDataSeeder;
use Database\Seeders\service_data\serviceperson_job\ServicepersonJobSeeder;
use Database\Seeders\service_data\unit\UnitDataSeeder;
use Database\Seeders\serviceperson\ServicepeopleStatusSeeder;
use Database\Seeders\serviceperson\SOSReasonsSeeder;
use Database\Seeders\system\admin\SuperAdminSeeder;
use Database\Seeders\system\RolesAndPermissionSeeder;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            $this->call([
                LookUpSeeder::class,
                ServicepeopleStatusSeeder::class,
                SOSReasonsSeeder::class,
                ServiceDataSeeder::class,
                QualificationSeeder::class,
                MedicalSeeder::class,
                RolesAndPermissionSeeder::class,
                SuperAdminSeeder::class,
            ]);
        });
    }
}
