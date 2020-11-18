<?php

namespace Database\Seeders\event;

use App\Models\Event\EventType;
use Illuminate\Database\Seeder;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Training Exercise',
                'slug' => null,
                'description' => null,
            ],
            [
                'name' => 'Range Exercise',
                'slug' => null,
                'description' => null,
            ],
            [
                'name' => 'Sport',
                'slug' => null,
                'description' => null,
            ],
            [
                'name' => 'Recreational',
                'slug' => null,
                'description' => null,
            ],
            [
                'name' => 'Cultural',
                'slug' => null,
                'description' => null,
            ],
            [
                'name' => 'Workshop',
                'slug' => null,
                'description' => null,
            ],
            [
                'name' => 'Seminar',
                'slug' => null,
                'description' => null,
            ],

        ];

        EventType::insert($types);
    }
}
