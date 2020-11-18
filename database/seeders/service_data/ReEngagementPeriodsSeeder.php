<?php
namespace Database\Seeders\service_data;

use App\Models\System\Serviceperson\ServiceData\ReEngagementPeriod;
use Illuminate\Database\Seeder;

class ReEngagementPeriodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reEngagementPeriods = [
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
                'name' => 'Six Years',
                'slug' => 6,
            ],
        ];

        ReEngagementPeriod::insert($reEngagementPeriods);
    }
}
