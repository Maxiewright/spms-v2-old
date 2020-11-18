<?php


namespace Database\Seeders\service_data\serviceperson_job;

use Database\Seeders\service_data\serviceperson_job\establishment\BranchEstablishmentSeeder;
use Database\Seeders\service_data\serviceperson_job\establishment\CareerPathEstablishmentSeeder;
use Database\Seeders\service_data\serviceperson_job\establishment\StreamEstablishmentSeeder;
use Illuminate\Database\Seeder;

class ServicepersonJobSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BranchSeeder::class,
            StreamSeeder::class,
            CareerPathSeeder::class,
            SpecialitySeeder::class,
            JobTitleSeeder::class,
            JobClassSeeder::class,
            JobSeeder::class,

            //Establishment
            BranchEstablishmentSeeder::class,
            StreamEstablishmentSeeder::class,
            CareerPathEstablishmentSeeder::class,
        ]);
    }
}
