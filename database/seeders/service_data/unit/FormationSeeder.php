<?php
namespace Database\Seeders\service_data\unit;

use App\Models\System\Serviceperson\Unit\Formation;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formations = [
            [
                'name' => 'Regiment',
                'long_name' => 'Trinidad and Tobago Regiment',
                'slug' => 'TTR'
            ],
            [
                'name' => 'Coast Guard',
                'long_name' => 'Trinidad and Tobago Coast Guard',
                'slug' => 'TTCG'
            ],
            [
                'name' => 'Air Guard',
                'long_name' => 'Trinidad and Tobago Air Guard',
                'slug' => 'TTAG'
            ],
//            [
//                'name' => 'Defence Force Reserves',
//                'long_name' => 'Trinidad and Tobago Defence Force Reserves',
//                'slug' => 'TTDFR'
//            ],
//            [
//                'name' => 'Defence Force Headquarters',
//                'long_name' => 'Trinidad and Tobago Defence Force Headquarters',
//                'slug' => 'TTDF'
//            ],
        ];

        Formation::insert($formations);

    }
}
