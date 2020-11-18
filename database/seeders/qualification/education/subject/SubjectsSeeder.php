<?php

namespace Database\Seeders\qualification\education\subject;

use Illuminate\Database\Seeder;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SubjectsGroupSeeder::class,
            CAPESubjectsSeeder::class,
            CSECSubjectsSeeder::class,

        ]);
    }
}
