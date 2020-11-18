<?php
namespace Database\Seeders\service_data;

use App\Models\System\Serviceperson\ServiceData\EngagementPeriod;
use Illuminate\Database\Seeder;

class EngagementPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $engagementPeriods = [
            [
                'name' => 'Six Months',
                'slug' => .5,
            ],
            [
                'name' => 'One Year',
                'slug' => 1,
            ],
            [
                'name' => 'Two Years',
                'slug' => 2,
            ],
            [
                'name' => 'Three Years',
                'slug' => 3,
            ],
            [
                'name' => 'Four Years',
                'slug' => 4,
            ],
            [
                'name' => 'Five Years',
                'slug' => 5,
            ],
            [
                'name' => 'Six Years',
                'slug' => 6,
            ],
        ];

        EngagementPeriod::insert($engagementPeriods);
    }
}
