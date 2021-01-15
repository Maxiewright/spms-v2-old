<?php

namespace Modules\Records\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Records\Entities\Index\FileSubSubcategory;

class EstablishementSubSubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $establishmentSubGroups = [
            //111. Recruitment
            [
                'id' => 1111,
                'name' => 'Establishment – TTDF / Recruitment Officers',
                'file_subcategory_id' => 111,
            ],
            [
                'id' => 1112,
                'name' => 'Parade / Complement State / Establishment Proposal/Mr Bender',
                'file_subcategory_id' => 111,
            ],
            [
                'id' => 1113,
                'name' => 'Recruitment – TTDF (Other Ranks) / Application for Enlistment – Other Ranks',
                'file_subcategory_id' => 111,
            ],
            [
                'id' => 1114,
                'name' => 'Re-Enlistment',
                'file_subcategory_id' => 111,
            ],
            [
                'id' => 1115,
                'name' => 'Re-Engagement',
                'file_subcategory_id' => 111,
            ],
            [
                'id' => 1116,
                'name' => 'Officers on Contract',
                'file_subcategory_id' => 111,
            ],

            //112. Discharge / Retirement / Resignation

            [
                'id' => 1121,
                'name' => 'Retirement Officers',
                'file_subcategory_id' => 112,
            ],
            [
                'id' => 1122,
                'name' => 'Resignation Officers',
                'file_subcategory_id' => 112,
            ],
            [
                'id' => 1123,
                'name' => 'Discharge Ors / Ratings / Discharge Officer Cadet',
                'file_subcategory_id' => 112,
            ],
            [
                'id' => 1124,
                'name' => 'Discharge Certificates / TTR Form 41’s',
                'file_subcategory_id' => 112,
            ],
            [
                'id' => 1125,
                'name' => 'Re-Instatement',
                'file_subcategory_id' => 112,
            ],

            //113. Promotions

            [
                'id' => 1131,
                'name' => 'Promotion Procedures',
                'file_subcategory_id' => 113,
            ],
            [
                'id' => 1132,
                'name' => 'Promotion - Officers',
                'file_subcategory_id' => 113,
            ],
            [
                'id' => 1133,
                'name' => 'Promotion – Other Ranks / Ratings',
                'file_subcategory_id' => 113,
            ],
            [
                'id' => 1134,
                'name' => 'Lieutenant to Captain Exams',
                'file_subcategory_id' => 113,
            ],

            //114. Personal Files TTR Officers

            [
                'id' => 114,
                'name' => 'TTR Officers',
                'file_subcategory_id' => 114,
            ],

            //115. Personal Files TTCG Officers

            [
                'id' => 115,
                'name' => 'CG Officers',
                'file_subcategory_id' => 115,
            ],

            //116. Transfer

            [
                'id' => 1161,
                'name' => 'Inter Unit Transfers (CG to TTR or TTR to CG) / AG',
                'file_subcategory_id' => 116,
            ],
            [
                'id' => 1162,
                'name' => 'Transfer / Attachments to & from other Gov’t Departments / DEFTIS',
                'file_subcategory_id' => 116,
            ],
            [
                'id' => 1163,
                'name' => 'Attachment / Detachment / Change of Coys (Inter Bn)',
                'file_subcategory_id' => 116,
            ],
            [
                'id' => 1164,
                'name' => 'Assignment of Ministry of National Security',
                'file_subcategory_id' => 116,
            ],
            [
                'id' => 1165,
                'name' => 'Attachment of Foreign Troops / Nigerian Pan',
                'file_subcategory_id' => 116,
            ],



        ];

        FileSubSubcategory::insert($establishmentSubGroups);
    }
}
