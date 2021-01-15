<?php

namespace Modules\Records\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Records\Entities\Index\FileSubSubcategory;

class PersonnelSubSubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $personnelSubGroups = [
            //101. Civilian Employees
            [
                'id' => 1011,
                'name' => 'Daily Paid at DFHQ',
                'file_subcategory_id' => 101,
            ],
            [
                'id' => 1012,
                'name' => 'Monthly Paid',
                'file_subcategory_id' => 101,
            ],

            //102. Classification

            [
                'id' => 1021,
                'name' => 'Annual Classification',
                'file_subcategory_id' => 102,
            ],
            [
                'id' => 1022,
                'name' => 'Trade Classification / Academic Qualifications',
                'file_subcategory_id' => 102,
            ],

            //103. Confidential Reports

            [
                'id' => 1031,
                'name' => 'Officers Confidential',
                'file_subcategory_id' => 103,
            ],
            [
                'id' => 1032,
                'name' => 'Other Ranks / Ratings / Draft Testimonials / Performance Appraisals / PFs',
                'file_subcategory_id' => 103,
            ],
            [
                'id' => 1033,
                'name' => 'Administrative Reports / Quarterly Activity Report / Priority Listing',
                'file_subcategory_id' => 103,
            ],
            [
                'id' => 1034,
                'name' => 'Curriculum / Resume Officers / Designation Offrs',
                'file_subcategory_id' => 103,
            ],
            [
                'id' => 1035,
                'name' => 'Intelligence Reports',
                'file_subcategory_id' => 103,
            ],
            [
                'id' => 1036,
                'name' => 'Occurrence Reports',
                'file_subcategory_id' => 103,
            ],

            //104. Discipline Matters

            [
                'id' => 1041,
                'name' => 'Outstanding Debts',
                'file_subcategory_id' => 104,
            ],
            [
                'id' => 1042,
                'name' => 'Conduct / Disciplinary Matters - Officers',
                'file_subcategory_id' => 104,
            ],
            [
                'id' => 1043,
                'name' => 'Complaint and Disturbances – DF Personnel / Complaint & Disturbances – Civilian',
                'file_subcategory_id' => 104,
            ],
            [
                'id' => 1044,
                'name' => 'Return of Punishment',
                'file_subcategory_id' => 104,
            ],
            [
                'id' => 1045,
                'name' => 'Unusual Occurrences',
                'file_subcategory_id' => 104,
            ],
            [
                'id' => 1046,
                'name' => 'Use of Illegal Drugs / Drug Testing / Certificate of Analysis',
                'file_subcategory_id' => 104,
            ],
            [
                'id' => 1047,
                'name' => 'Redress – Captain R Kelshall',
                'file_subcategory_id' => 104,
            ],
            [
                'id' => 1048,
                'name' => 'Redress – Major A Dalip',
                'file_subcategory_id' => 104,
            ],
            [
                'id' => 1049,
                'name' => 'Petitions / Ex-Pte Ramesh Raghoo (8050)',
                'file_subcategory_id' => 104,
            ],

            //. Court Martial

            [
                'id' => 1051,
                'name' => 'Court Martial',
                'file_subcategory_id' => 105,
            ],
            [
                'id' => 1052,
                'name' => 'Captain T King (Whole file placed in Officer’s PF 12/11/97)',
                'file_subcategory_id' => 105,
            ],
            [
                'id' => 1053,
                'name' => '4389 Cpl Joseph R – re-enlisted',
                'file_subcategory_id' => 105,
            ],
            [
                'id' => 1054,
                'name' => 'Lt LE Chandler / Record of Proceedings – Lt LE Chandler',
                'file_subcategory_id' => 105,
            ],

            //106. Dress

            [
                'id' => 1061,
                'name' => 'Dress – Policy',
                'file_subcategory_id' => 106,
            ],
            [
                'id' => 1062,
                'name' => 'Dress Regulations – TTR',
                'file_subcategory_id' => 106,
            ],
            [
                'id' => 1063,
                'name' => 'Dress Regulations – TTCG',
                'file_subcategory_id' => 106,
            ],

            //107. Welfare and Entertainment

            [
                'id' => 1071,
                'name' => 'Request for Liquor for Functions',
                'file_subcategory_id' => 107,
            ],
            [
                'id' => 1072,
                'name' => 'Officers Mess – DFHQ / Carols by Candlelight / CDS Cocktails',
                'file_subcategory_id' => 107,
            ],
            [
                'id' => 1073,
                'name' => 'Officers Mess – Teteron Barracks / Officers Mess – 1TTR / 2TTR',
                'file_subcategory_id' => 107,
            ],
            [
                'id' => 1074,
                'name' => 'Officers Mess – Staubles Bay',
                'file_subcategory_id' => 107,
            ],
            [
                'id' => 1075,
                'name' => 'WO’s & Sgt’s Mess - Teteron Barracks',
                'file_subcategory_id' => 107,
            ],
            [
                'id' => 1076,
                'name' => 'WO’s & Sgt’s Mess – DFHQ',
                'file_subcategory_id' => 107,
            ],
            [
                'id' => 1077,
                'name' => 'Senior Rates Mess – Staubles Bay',
                'file_subcategory_id' => 107,
            ],
            [
                'id' => 1078,
                'name' => 'DFHQ Canteen / ‘D’ Club',
                'file_subcategory_id' => 107,
            ],
            [
                'id' => 1079,
                'name' => 'Combine Services Officers Mess / Armistice Dinner',
                'file_subcategory_id' => 107,
            ],
            [
                'id' => 10710,
                'name' => 'Welfare Activity within the Force / Forecast of Events / Children’s Xmas Party / Welfare Activities – 1TTR/2TTR/SSB/TTR/DFHQ',
                'file_subcategory_id' => 107,
            ],
            [
                'id' => 10711,
                'name' => 'Compensation/Assistance DF Personnel/Family Support Group',
                'file_subcategory_id' => 107,
            ],
            [
                'id' => 10712,
                'name' => 'Millennium Ball/National Security Carnival Brunch',
                'file_subcategory_id' => 107,
            ],
            [
                'id' => 10713,
                'name' => 'All Ranks Concert/Ball',
                'file_subcategory_id' => 107,
            ],

            //108. Insurance

            [
                'id' => 1081,
                'name' => 'Group Plan',
                'file_subcategory_id' => 108,
            ],
            [
                'id' => 1082,
                'name' => 'Aircraft',
                'file_subcategory_id' => 108,
            ],
            [
                'id' => 1083,
                'name' => 'Vehicles',
                'file_subcategory_id' => 108,
            ],
            [
                'id' => 1084,
                'name' => 'Boats',
                'file_subcategory_id' => 108,
            ],
            [
                'id' => 1085,
                'name' => 'General Insurance',
                'file_subcategory_id' => 108,
            ],

            //109. Leave

            [
                'id' => 1091,
                'name' => 'Officers Leave',
                'file_subcategory_id' => 109,
            ],
            [
                'id' => 1092,
                'name' => 'Other Ranks / Ratings',
                'file_subcategory_id' => 109,
            ],

            //1010. Recommendation / Commendation

            [
                'id' => 10101,
                'name' => 'Visa Letters to Embassies / High Commission',
                'file_subcategory_id' => 1010,
            ],
            [
                'id' => 10102,
                'name' => 'Letter of Thanks / Recommendation / Commendation to Personnel',
                'file_subcategory_id' => 1010,
            ],
            [
                'id' => 10103,
                'name' => 'Draft Agreement between T&T & People’s Republic of China',
                'file_subcategory_id' => 1010,
            ],
            [
                'id' => 10104,
                'name' => 'Donation / Gift to Defence Force',
                'file_subcategory_id' => 1010,
            ],

            //1011. Legal Matters

            [
                'id' => 10111,
                'name' => 'High Court Action Against Members of TTDF / High Court Action – Vehicle Accident 3 TTR 92',
                'file_subcategory_id' => 1011,
            ],
            [
                'id' => 10112,
                'name' => 'Magistrate’s Court',
                'file_subcategory_id' => 1011,
            ],
            [
                'id' => 10113,
                'name' => 'MOU’s & Legal Frameworks',
                'file_subcategory_id' => 1011,
            ],
            [
                'id' => 10114,
                'name' => 'International Criminal Court',
                'file_subcategory_id' => 1011,
            ],

        ];

        FileSubSubcategory::insert($personnelSubGroups);
    }
}
