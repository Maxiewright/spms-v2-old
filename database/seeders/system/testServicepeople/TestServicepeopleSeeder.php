<?php

namespace Database\Seeders\system\testServicepeople;

use Illuminate\Database\Seeder;

class TestServicepeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            Admin2Seeder::class,
            ServicepersonSeeder::class,
            Serviceperson2Seeder::class,
        ]);
    }
}
