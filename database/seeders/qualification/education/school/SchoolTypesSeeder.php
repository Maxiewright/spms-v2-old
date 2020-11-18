<?php

namespace Database\Seeders\qualification\education\school;

use App\Models\System\Serviceperson\Qualifications\Education\SchoolType;
use Illuminate\Database\Seeder;

class SchoolTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schoolTypes = [
            [
//                    1
                'name' => 'ASJA',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    2
                'name' => 'Anglican',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    3
                'name' => 'Baptist',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    4
                'name' => 'Government Secondary',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    5
                'name' => 'Hindu',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    6
                'name' => 'Pentecostal',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    7
                'name' => 'Private',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    8
                'name' => 'Presbyterian',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    9
                'name' => 'Roman Catholic',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    10
                'name' => 'College',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    11
                'name' => 'University',
                'created_at' => '2020-02-17 11:10:00',
            ],
            [
//                    12
                'name' => 'Vocational',
                'created_at' => '2020-02-17 11:10:00',
            ],

        ];
        SchoolType::insert($schoolTypes);
    }
}
