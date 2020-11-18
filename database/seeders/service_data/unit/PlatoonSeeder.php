<?php

namespace Database\Seeders\service_data\unit;

use App\Models\System\Serviceperson\Unit\Platoon;
use Illuminate\Database\Seeder;

class PlatoonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $platoons = [

            //Eng Departments
            [
                'name'=>'Water Purification Troop',
                'slug'=>'WP Trp',
                'company_id'=> 1,
                'created_at'=> now(),
            ],
            [
                'name'=>'Power Generation Troop',
                'slug'=>'PG Trp',
                'company_id'=> 1,
                'created_at'=> now(),
            ],
            [
                'name'=>'Training Troop',
                'slug'=>'Trg Trp',
                'company_id'=> 1,
                'created_at'=> now(),
            ],
            [
                'name'=>'Resources Troop',
                'slug'=>'R Trp',
                'company_id'=> 1,
                'created_at'=> now(),
            ],

            [
                'name'=>'Field Troop',
                'slug'=>'Fd Trp',
                'company_id'=> 2,
                'created_at'=> now(),
            ],
            [
                'name'=>'Support Troop',
                'slug'=>'Sp Trp',
                'company_id'=> 2,
                'created_at'=> now(),
            ],
            [
                'name'=>'Squadron Troop',
                'slug'=>'Sqd Trp',
                'company_id'=> 2,
                'created_at'=> now(),
            ],
            [
                'name'=>'Construction Troop',
                'slug'=>'Constr Trp',
                'company_id'=> 2,
                'created_at'=> now(),
            ],
            [
                'name'=>'Plant Troop',
                'slug'=>'Plant Trp',
                'company_id'=> 2,
                'created_at'=> now(),
            ],
            [
                'name'=>'Squadron Headquarter',
                'slug'=>'Sqn HQ',
                'company_id'=> 2,
                'created_at'=> now(),
            ],

            [
                'name'=>'Quartermaster Department',
                'slug'=>'QM Dept',
                'company_id'=> 1,
                'created_at'=> now(),
            ],

            //SSB Departments
            [
                'name'=>'Regimental Band',
                'slug'=>'Regimental Bd',
                'company_id'=> 18,
                'created_at'=> now(),
            ],
            [
                'name'=>'Medical Inspection Room',
                'slug'=>'MIR',
                'company_id'=> 18,
                'created_at'=> now(),
            ],
            [
                'name'=>'Intelligence',
                'slug'=>'Intelligence',
                'company_id'=> 18,
                'created_at'=> now(),
            ],
            [
                'name'=>'DFHQ Provost',
                'slug'=>'DFHQ Provost',
                'company_id'=> 21,
                'created_at'=> now(),
            ],
            [
                'name'=>'RHQ Provost',
                'slug'=>'RHQ Provost',
                'company_id'=> 21,
                'created_at'=> now(),
            ],
            [
                'name'=>'Chaguaramas Maingate Provost',
                'slug'=>'Chag Maingate',
                'company_id'=> 21,
                'created_at'=> now(),
            ],
            [
                'name'=>'SSB Provost Platoon',
                'slug'=>'SSB Plt',
                'company_id'=> 21,
                'created_at'=> now(),
            ],
            [
                'name'=>'Presidential Regiment Institute Department',
                'slug'=>'PRI Dep',
                'company_id'=> 19,
                'created_at'=> now(),
            ],
            [
                'name'=>'Messing Deparment',
                'slug'=>'Messing Dep',
                'company_id'=> 19,
                'created_at'=> now(),
            ],
            [
                'name'=>'Messing and Clubs Deparment',
                'slug'=>'Messing and Clubs Dep',
                'company_id'=> 19,
                'created_at'=> now(),
            ],
            [
                'name'=>'Communication Platoon',
                'slug'=>'Com Plt',
                'company_id'=> 20,
                'created_at'=> now(),
            ],
            [
                'name'=>'Pioneer Troop',
                'slug'=>'Pioneer Trp',
                'company_id'=> 20,
                'created_at'=> now(),
            ],
            [
                'name'=>'Sanitation Department',
                'slug'=>'Sanitation Dep',
                'company_id'=> 20,
                'created_at'=> now(),
            ],
            [
                'name'=>'Mechanical Transport Platoon',
                'slug'=>'MT Plt',
                'company_id'=> 19,
                'created_at'=> now(),
            ],
            [
                'name'=>'Repair and Maintenance Platoon',
                'slug'=>'Repair and Maintenance Plt',
                'company_id'=> 21,
                'created_at'=> now(),
            ],


            //1-2TTR Platoons
            [
                'name'=>'1 Platoon',
                'slug'=>'1 Plt',
                'company_id'=> 5,
                'created_at'=> now(),
            ],
            [
                'name'=>'2 Platoon',
                'slug'=>'2 Plt',
                'company_id'=> 5,
                'created_at'=> now(),
            ],
            [
                'name'=>'3 Platoon',
                'slug'=>'3 Plt',
                'company_id'=> 5,
                'created_at'=> now(),
            ],
            [
                'name'=>'4 Platoon',
                'slug'=>'4 Plt',
                'company_id'=> 6,
                'created_at'=> now(),
            ],
            [
                'name'=>'5 Platoon',
                'slug'=>'5 Plt',
                'company_id'=> 6,
                'created_at'=> now(),
            ],
            [
                'name'=>'6 Platoon',
                'slug'=>'6 Plt',
                'company_id'=> 6,
                'created_at'=> now(),
            ],
            [
                'name'=>'7 Platoon',
                'slug'=>'7 Plt',
                'company_id'=> 7,
                'created_at'=> now(),
            ],
            [
                'name'=>'8 Platoon',
                'slug'=>'8 Plt',
                'company_id'=> 7,
                'created_at'=> now(),
            ],
            [
                'name'=>'9 Platoon',
                'slug'=>'9 Plt',
                'company_id'=> 7,
                'created_at'=> now(),
            ],
            [
                'name'=>'10 Platoon',
                'slug'=>'10 Plt',
                'company_id'=> 8,
                'created_at'=> now(),
            ],
            [
                'name'=>'11 Platoon',
                'slug'=>'11 Plt',
                'company_id'=> 8,
                'created_at'=> now(),
            ],
            [
                'name'=>'12 Platoon',
                'slug'=>'12 Plt',
                'company_id'=> 8,
                'created_at'=> now(),
            ],
            [
                'name'=>'13 Platoon',
                'slug'=>'13 Plt',
                'company_id'=> 10,
                'created_at'=> now(),
            ],
            [
                'name'=>'14 Platoon',
                'slug'=>'14 Plt',
                'company_id'=> 10,
                'created_at'=> now(),
            ],
            [
                'name'=>'15 Platoon',
                'slug'=>'15 Plt',
                'company_id'=> 10,
                'created_at'=> now(),
            ],
            [
                'name'=>'16 Platoon',
                'slug'=>'16 Plt',
                'company_id'=> 11,
                'created_at'=> now(),
            ],
            [
                'name'=>'17 Platoon',
                'slug'=>'17 Plt',
                'company_id'=> 11,
                'created_at'=> now(),
            ],
            [
                'name'=>'18 Platoon',
                'slug'=>'18 Plt',
                'company_id'=> 11,
                'created_at'=> now(),
            ],
            [
                'name'=>'19 Platoon',
                'slug'=>'19 Plt',
                'company_id'=> 12,
                'created_at'=> now(),
            ],
            [
                'name'=>'20 Platoon',
                'slug'=>'20 Plt',
                'company_id'=> 12,
                'created_at'=> now(),
            ],
            [
                'name'=>'21 Platoon',
                'slug'=>'21 Plt',
                'company_id'=> 12,
                'created_at'=> now(),
            ],
            [
                'name'=>'22 Platoon',
                'slug'=>'22 Plt',
                'company_id'=> 13,
                'created_at'=> now(),
            ],
            [
                'name'=>'23 Platoon',
                'slug'=>'23 Plt',
                'company_id'=> 13,
                'created_at'=> now(),
            ],
            [
                'name'=>'24 Platoon',
                'slug'=>'24 Plt',
                'company_id'=> 13,
                'created_at'=> now(),
            ],

            //Coys HQs - Admin


            [
                'name'=>'Headquarter - Headquarter Company Support and Service ',
                'slug'=>'HQ HQ Coy',
                'company_id'=> 18,
                'created_at'=> now(),
            ],
            [
                'name'=>'Headquarter - Provost Company',
                'slug'=>'HQ Provost Coy',
                'company_id'=> 21 ,
                'created_at'=> now(),
            ],
            [
                'name'=>'Headquarter - Supply and Transport Company',
                'slug'=>'HQ S&T Coy',
                'company_id'=> 19,
                'created_at'=> now(),
            ],
            [
                'name'=>'Headquarter - Maintenance Coy',
                'slug'=>'HQ Maintenance Coy',
                'company_id'=> 20,
                'created_at'=> now(),
            ],
            [
                'name'=>'Headquarter - Headquarter Company 1st Infantry Battalion',
                'slug'=>'HQ HQ Coy 1TTR',
                'company_id'=> 4,
                'created_at'=> now(),
            ],
            [
                'name'=>'Headquarter - Alpha Company',
                'slug'=>'HQ A Coy',
                'company_id'=> 5,
                'created_at'=> now(),
            ],
            [
                'name'=>'Headquarter - Bravo Company',
                'slug'=>'HQ B Coy',
                'company_id'=> 6,
                'created_at'=> now(),
            ],
            [
                'name'=>'Headquarter - Charlie Company',
                'slug'=>'HQ C Coy',
                'company_id'=> 7,
                'created_at'=> now(),
            ],
            [
                'name'=>'Headquarter - Delta Company',
                'slug'=>'HQ D Coy',
                'company_id'=> 8,
                'created_at'=> now(),
            ],
            [
                'name'=>'Headquarter - Headquarter Company 2nd Infantry Battalion',
                'slug'=>'HQ HQ Coy 2TTR',
                'company_id'=> 9,
                'created_at'=> now(),
            ],
            [
                'name'=>'Headquarter - Echo Company',
                'slug'=>'HQ E Coy',
                'company_id'=> 10,
                'created_at'=> now(),
            ],
            [
                'name'=>'Headquarter - Foxtrot Company',
                'slug'=>'HQ F Coy',
                'company_id'=> 11,
                'created_at'=> now(),
            ],
            [
                'name'=>'Headquarter - Gulf Company',
                'slug'=>'HQ G Coy',
                'company_id'=> 12,
                'created_at'=> now(),
            ],
            [
                'name'=>'Headquarter - Hotel Company',
                'slug'=>'HQ H Coy',
                'company_id'=> 13,
                'created_at'=> now(),
            ],
            [
                'name'=>'Headquarter - Special Forces Operation Detachment',
                'slug'=>'HQ SFOD',
                'company_id'=> 14,
                'created_at'=> now(),
            ],

        ];

        Platoon::insert($platoons);
    }
}
