<?php

namespace Modules\Events\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Events\Entities\EventStatus;

class EventStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

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
