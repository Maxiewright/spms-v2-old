<?php

namespace Database\Seeders\qualification\education\school;

use App\Models\System\Serviceperson\Qualifications\Education\SchoolDistrict;
use Illuminate\Database\Seeder;

class SchoolDistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schoolDistricts = [
            [
//                    1
                'name' => 'Caroni',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    2
                'name' => 'North Eastern',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    3
                'name' => 'Port of Sapin',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    4
                'name' => 'South Eastern',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    5
                'name' => 'St George East',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    6
                'name' => 'St Patrick',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    7
                'name' => 'Tobago',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    8
                'name' => 'Victoria',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    9
                'name' => 'Unknown',
                'created_at' => '2020-02-17 11:10:00',
            ],
        ];
        SchoolDistrict::insert($schoolDistricts);
    }
}
