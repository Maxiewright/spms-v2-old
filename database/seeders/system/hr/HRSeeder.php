<?php


namespace Database\Seeders\system\hr;


use Illuminate\Database\Seeder;

class HRSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ADavidSeeder::class,
            KRaphaelSeeder::class,
            LJosephSeeder::class,
            MWilliamsSeeder::class,
            NAmingSeeder::class,
            PDerrySeeder::class,
            SAntoinetteSeeder::class,
        ]);
    }
}
