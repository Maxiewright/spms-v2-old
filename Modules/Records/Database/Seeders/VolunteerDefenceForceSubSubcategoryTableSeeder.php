<?php

namespace Modules\Records\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Records\Entities\Index\FileSubSubcategory;

class VolunteerDefenceForceSubSubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $volunteerDefenceForceSubGroups = [
            //151. TTR
            [
                'id' => 1511,
                'name' => 'Matters Affecting VDF',
                'file_subcategory_id' => 151,
            ],
            [
                'id' => 1512,
                'name' => 'Permanent Staff Volunteers (Contracted)',
                'file_subcategory_id' => 151,
            ],
            [
                'id' => 1513,
                'name' => 'VDF – Regulations',
                'file_subcategory_id' => 151,
            ],
            [
                'id' => 1514,
                'name' => 'VDF Officers on Contract',
                'file_subcategory_id' => 151,
            ],
            [
                'id' => 1515,
                'name' => 'VDF Training Programme',
                'file_subcategory_id' => 151,
            ],
            [
                'id' => 1516,
                'name' => 'Recruitment VDF (TTR)',
                'file_subcategory_id' => 151,
            ],
            [
                'id' => 1517,
                'name' => 'Discharges VDF (TTR)',
                'file_subcategory_id' => 151,
            ],
            [
                'id' => 1518,
                'name' => 'Parades',
                'file_subcategory_id' => 151,
            ],
            [
                'id' => 1519,
                'name' => 'Promotion – Other Ranks',
                'file_subcategory_id' => 151,
            ],
            [
                'id' => 15110,
                'name' => 'Promotion – Officers',
                'file_subcategory_id' => 151,
            ],
            [
                'id' => 15111,
                'name' => 'Children Christmas Party / Carnival Dance / Family Day / Welfare Activities',
                'file_subcategory_id' => 151,
            ],

            //152. TTCG

            [
                'id' => 1521,
                'name' => 'Formation of VDF – CG/Recruitment',
                'file_subcategory_id' => 152,
            ],
            [
                'id' => 1522,
                'name' => 'Coast Guard Auxiliary',
                'file_subcategory_id' => 152,
            ],

        ];

        FileSubSubcategory::insert($volunteerDefenceForceSubGroups);
    }
}
