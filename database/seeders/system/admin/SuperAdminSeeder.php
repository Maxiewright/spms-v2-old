<?php

namespace Database\Seeders\system\admin;

use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
           MWrightSeeder::class,
           SRogersSeeder::class,
           AEdwardsSeeder::class,
           PGaneshSeeder::class,
           MThompsonSeeder::class,
           ACharlesSeeder::class,
           CEllisSeeder::class,
           KRobertsSeeder::class,
           SGlasgowSeeder::class,
       ]);
    }
}
