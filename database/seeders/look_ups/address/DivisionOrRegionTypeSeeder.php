<?php
namespace Database\Seeders\look_ups\address;

use App\Models\System\Serviceperson\Address\DivisionOrRegionType;
use Illuminate\Database\Seeder;

class DivisionOrRegionTypeSeeder extends Seeder
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
                'name' => 'Region',
                'created_at' => '2020-08-18 15:00:00',
                'updated_at' => '2020-08-18 15:00:00'
            ],
            [
                'name' => 'Borough',
                'created_at' => '2020-08-18 15:00:00',
                'updated_at' => '2020-08-18 15:00:00'
            ],
            [
                'name' => 'City',
                'created_at' => '2020-08-18 15:00:00',
                'updated_at' => '2020-08-18 15:00:00'
            ],
            [
                'name' => 'Ward',
                'created_at' => '2020-08-18 15:00:00',
                'updated_at' => '2020-08-18 15:00:00'
            ],
        ];

        DivisionOrRegionType::insert($types);
    }
}
