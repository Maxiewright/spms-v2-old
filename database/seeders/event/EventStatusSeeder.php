<?php

namespace Database\Seeders\event;

use App\Models\Event\EventStatus;
use Illuminate\Database\Seeder;

class EventStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'unscheduled',
                'slug' => null,
                'description' => 'The date for this event is not yet confirmed',
            ],
            [
                'name' => 'Upcoming',
                'slug' => null,
                'description' => 'The event has been scheduled and is upcoming',
            ],
            [
                'name' => 'Started',
                'slug' => null,
                'description' => ' The event has started and is ongoing',
            ],
            [
                'name' => 'Postponed',
                'slug' => null,
                'description' => 'The event has been push to a later date',
            ],
            [
                'name' => 'Cancelled',
                'slug' => null,
                'description' => 'The event has been cancelled',
            ],
            [
                'name' => 'Finished',
                'slug' => null,
                'description' => 'The event has ended',
            ],
        ];

        EventStatus::insert($statuses);
    }
}
