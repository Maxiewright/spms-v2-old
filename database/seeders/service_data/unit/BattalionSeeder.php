<?php

namespace Database\Seeders\service_data\unit;

use App\Models\System\Serviceperson\Unit\Battalion;
use Illuminate\Database\Seeder;

class BattalionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $battalions = [
            [
                'name'=>'1st Engineer Battalion',
                'slug'=>'1Eng',
                'created_at'=> now(),
            ],
            [
                'name'=>'1st Infantry Battalion',
                'slug'=>'1TTR',
                'created_at'=> now(),
            ],
            [
                'name'=>'2nd Infantry Battalion',
                'slug'=>'2TTR',
                'created_at'=> now(),
            ],
            [
                'name'=>'Army Learning Centre',
                'slug'=>'ALC',
                'created_at'=> now(),
            ],
            [
                'name'=>'Support and Service Battalion',
                'slug'=>'SSB',
                'created_at'=> now(),
            ],
            [
                'name'=>'Defence Force Headquarters',
                'slug'=>'DFHQ',
                'created_at'=> now(),
            ]
        ];

        Battalion::insert($battalions);
    }
}
