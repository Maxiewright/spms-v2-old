<?php

namespace Modules\Events\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Events\Entities\EventType;

class EventTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

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
