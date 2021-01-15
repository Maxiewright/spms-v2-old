<?php

namespace Database\Seeders\service_data;

use Database\Seeders\service_data\deployment\DeploymentCountrySeeder;
use Database\Seeders\service_data\deployment\DeploymentTypeSeeder;
use Database\Seeders\service_data\serviceperson_job\ServicepersonJobSeeder;
use Database\Seeders\service_data\unit\UnitDataSeeder;
use Illuminate\Database\Seeder;

class ServiceDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DecorationsSeeder::class,
            EnlistmentTypeSeeder::class,
            EngagementPeriodSeeder::class,
            RankSeeder::class,
            ReEngagementPeriodsSeeder::class,
//            Unit
            UnitDataSeeder::class,
//            Job
            ServicepersonJobSeeder::class,
            // Deployment
            DeploymentCountrySeeder::class,
            DeploymentTypeSeeder::class,
        ]);
    }
}
