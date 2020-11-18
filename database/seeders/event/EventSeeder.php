<?php

namespace Database\Seeders\event;

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
           EventTypeSeeder::class,
           EventStatusSeeder::class,
           EventVenueSeeder::class,
       ]);
    }
}
