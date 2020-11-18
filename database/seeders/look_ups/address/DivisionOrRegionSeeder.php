<?php
namespace Database\Seeders\look_ups\address;

use App\Models\System\Serviceperson\Address\DivisionOrRegion;
use Illuminate\Database\Seeder;

class DivisionOrRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisionOrRegions = [

            [
                'division_or_region_type_id'    =>  1,
                'code'    =>  'CTT',
                'name'    =>  'Couva/Tabaquite/Talparo',
                'created_at' => '2020-02-12 21:10:00',
                'updated_at' => '2020-02-12 21:10:00',
            ],
            [
                'division_or_region_type_id'    =>  1,
                'code'    =>  'DMN',
                'name'    =>  'Diego Martin',
                'created_at' => '2020-02-12 21:10:00',
                'updated_at' => '2020-02-12 21:10:00',
            ],
            [
                'division_or_region_type_id'    =>  1,
                'code'    =>  'MRC',
                'name'    =>  'Mayaro/Rio Claro',
                'created_at' => '2020-02-12 21:10:00',
                'updated_at' => '2020-02-12 21:10:00',
            ],
            [
                'division_or_region_type_id'    =>  1,
                'code'    =>  'PED',
                'name'    =>  'Penal/Debe',
                'created_at' => '2020-02-12 21:10:00',
                'updated_at' => '2020-02-12 21:10:00',
            ],
            [
                'division_or_region_type_id'    =>  1,
                'code'    =>  'PRT',
                'name'    =>  'Princes Town',
                'created_at' => '2020-02-12 21:10:00',
                'updated_at' => '2020-02-12 21:10:00',
            ],
            [
                'division_or_region_type_id'    =>  1,
                'code'    =>  'SGE',
                'name'    =>  'Sangre Grande',
                'created_at' => '2020-02-12 21:10:00',
                'updated_at' => '2020-02-12 21:10:00',
            ],
            [
                'division_or_region_type_id'    =>  1,
                'code'    =>  'SJL',
                'name'    =>  'San Juan/Laventille',
                'created_at' => '2020-02-12 21:10:00',
                'updated_at' => '2020-02-12 21:10:00',
            ],
            [
                'division_or_region_type_id'    =>  1,
                'code'    =>  'SIP',
                'name'    =>  'Siparia',
                'created_at' => '2020-02-12 21:10:00',
                'updated_at' => '2020-02-12 21:10:00',
            ],
            [
                'division_or_region_type_id'    =>  1,
                'code'    =>  'TUP',
                'name'    =>  'Tunapuna/Piarco',
                'created_at' => '2020-02-12 21:10:00',
                'updated_at' => '2020-02-12 21:10:00',
            ],
            [
                'division_or_region_type_id'    =>  2,
                'code'    =>  'ARI',
                'name'    =>  'Arima',
                'created_at' => '2020-02-12 21:10:00',
                'updated_at' => '2020-02-12 21:10:00',
            ],
            [
                'division_or_region_type_id'    =>  2,
                'code'    =>  'CHA',
                'name'    =>  'Chaguanas',
                'created_at' => '2020-02-12 21:10:00',
                'updated_at' => '2020-02-12 21:10:00',
            ],
            [
                'division_or_region_type_id'    =>  2,
                'code'    =>  'PTF',
                'name'    =>  'Point Fortin',
                'created_at' => '2020-02-12 21:10:00',
                'updated_at' => '2020-02-12 21:10:00',
            ],
            [
                'division_or_region_type_id'    =>  3,
                'code'    =>  'POS',
                'name'    =>  'Post Of Spain',
                'created_at' => '2020-02-12 21:10:00',
                'updated_at' => '2020-02-12 21:10:00',
            ],
            [
                'division_or_region_type_id'    =>  3,
                'code'    =>  'SFO',
                'name'    =>  'San Fernando',
                'created_at' => '2020-02-12 21:10:00',
                'updated_at' => '2020-02-12 21:10:00',
            ],
            [
                'division_or_region_type_id'    =>  4,
                'code'    =>  'TOB',
                'name'    =>  'Tobago',
                'created_at' => '2020-02-12 21:10:00',
                'updated_at' => '2020-02-12 21:10:00',
            ]];

        DivisionOrRegion::insert($divisionOrRegions);
    }
}
