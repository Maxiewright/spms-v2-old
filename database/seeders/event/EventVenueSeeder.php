<?php

namespace Database\Seeders\event;

use App\Models\Event\EventVenue;
use Illuminate\Database\Seeder;

class EventVenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $venues = [
            [
                'name' => 'Teteron Barracks',
                'slug' => 'Teteron',
                'description' => null,
            ],
            [
                'name' => 'Tucker Valley Range',
                'slug' => 'Tucker Valley',
                'description' => null,
            ],
            [
                'name' => 'Chaguaramas Area',
                'slug' => 'Chag Area',
                'description' => null,
            ],
            [
                'name' => 'Camp Ogden',
                'slug' => 'Ogden',
                'description' => null,
            ],
        ];

        EventVenue::insert($venues);
    }
}
