<?php

namespace Modules\Events\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Events\Entities\EventVenue;

class EventVenueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

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
