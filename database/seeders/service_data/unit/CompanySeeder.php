<?php

namespace Database\Seeders\service_data\unit;

use App\Models\System\Serviceperson\Unit\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            //Eng
            [
                'name'=>'Support Squadron',
                'slug'=>'Support Sqn',
                'battalion_id' => 1,
                'created_at'=> now(),
            ],
            [
                'name'=>'Field and Construction Squadron',
                'slug'=>'Fld & Const Sqn',
                'battalion_id' => 1,
                'created_at'=> now(),
            ],
            [
                'name'=>'Electrical & Mechanical Engineering Squadron',
                'slug'=>'EME Sqn',
                'battalion_id' => 1,
                'created_at'=> now(),
            ],

            //1TTR
            [
                'name'=>'Trinidad and Tobago Regiment Headquarters',
                'slug'=>'RHQ',
                'battalion_id' => 2,
                'created_at'=> now(),
            ],
            [
                'name'=>'Headquarter Company - 1st Infantry Battalion',
                'slug'=>'HQ 1TTR',
                'battalion_id' => 2,
                'created_at'=> now(),
            ],
            [
                'name'=>'Alpha Company',
                'slug'=>'A Coy',
                'battalion_id' => 2,
                'created_at'=> now(),
            ],
            [
                'name'=>'Bravo Company',
                'slug'=>'B Coy',
                'battalion_id' => 2,
                'created_at'=> now(),
            ],
            [
                'name'=>'Charlie Company',
                'slug'=>'C Coy',
                'battalion_id' => 2,
                'created_at'=> now(),
            ],
            [
                'name'=>'Delta Company',
                'slug'=>'D Coy',
                'battalion_id' => 2,
                'created_at'=> now(),
            ],

            //2TTR
            [
                'name'=>'Headquarter Company - 2nd Infantry Battalion',
                'slug'=>'HQ 2TTR',
                'battalion_id' => 3,
                'created_at'=> now(),
            ],
            [
                'name'=>'Echo Company',
                'slug'=>'E Coy',
                'battalion_id' => 3,
                'created_at'=> now(),
            ],
            [
                'name'=>'Foxtrot Company',
                'slug'=>'F Coy',
                'battalion_id' => 3,
                'created_at'=> now(),
            ],
            [
                'name'=>'Gulf Company',
                'slug'=>'G Coy',
                'battalion_id' => 3,
                'created_at'=> now(),
            ],
            [
                'name'=>'Hotel Company',
                'slug'=>'H Coy',
                'battalion_id' => 3,
                'created_at'=> now(),
            ],
            [
                'name'=>'Special Forces Operations Detachment',
                'slug'=>'SFOD',
                'battalion_id' => 3,
                'created_at'=> now(),
            ],

            //ALC
            [
                'name'=>'Headquarter Element Army Learning Centre',
                'slug'=>'HQ ALC',
                'battalion_id' => 4,
                'created_at'=> now(),
            ],
            [
                'name'=>'NCO and Recruit Training Division',
                'slug'=>'NRTD',
                'battalion_id' => 4,
                'created_at'=> now(),
            ],
            [
                'name'=>'Officers and Warrant Officers Training Division',
                'slug'=>'OWTD',
                'battalion_id' => 4,
                'created_at'=> now(),
            ],

            //SSB
            [
                'name'=>'Headquarter Company - Support and Service Battalion',
                'slug'=>'HQ SSB',
                'battalion_id' => 5,
                'created_at'=> now(),
            ],
            [
                'name'=>'Supply and Transport Company - Support and Service Battalion',
                'slug'=>'S & T SSB',
                'battalion_id' => 5,
                'created_at'=> now(),
            ],
            [
                'name'=>'Maintenance Company - Support and Service Battalion',
                'slug'=>'Mn SSB',
                'battalion_id' => 5,
                'created_at'=> now(),
            ],
            [
                'name'=>'Provost Company - Support and Service Battalion',
                'slug'=>'Provost SSB',
                'battalion_id' => 5,
                'created_at'=> now(),
            ],
            [
                'name'=>'Specialised Youth Service Programme',
                'slug'=>'SYSP',
                'battalion_id' => 6,
                'created_at'=> now(),
            ],

        ];

        Company::insert($companies);
    }
}
