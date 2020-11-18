<?php
namespace Database\Seeders\file;

use App\Models\System\Universal\Polymorphic\File\FileSubcategory;
use Illuminate\Database\Seeder;

class FileSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $fileSubcategories = [
//1.	Accommodation
                [
                    'id' => 11,
                    'name' => 'Camps',
                    'file_category_id' => 1,
                ],
                [
                    'id' => 12,
                    'name' => 'Housing',
                    'file_category_id' => 1,
                ],
//2.	Administration
                [
                    'id' => 21,
                    'name' => 'Accidents',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 22,
                    'name' => 'Chaplain',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 23,
                    'name' => 'Arms / Ammunition',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 24,
                    'name' => 'Assistance to Civilian Organization',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 25,
                    'name' => 'Crisis / Disasters',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 26,
                    'name' => 'Communication',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 27,
                    'name' => 'Elections',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 28,
                    'name' => 'Equipment / Stationery',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 29,
                    'name' => 'Survey',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 210,
                    'name' => 'Inspection',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 211,
                    'name' => 'Invitations',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 212,
                    'name' => 'Medals / Awards / Flags',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 213,
                    'name' => 'Order / Interviews',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 214,
                    'name' => 'Policy / Regulations',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 215,
                    'name' => 'Visits',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 216,
                    'name' => 'Command',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 217,
                    'name' => 'Government Institution',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 218,
                    'name' => 'Publications / Circular Memorandum',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 219,
                    'name' => 'Vehicles / Military ID / Military Drivers Permit',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 220,
                    'name' => 'Agriculture',
                    'file_category_id' => 2,
                ],
                [
                    'id' => 221,
                    'name' => 'Private',
                    'file_category_id' => 2,
                ],
//3.	Boards
                [
                    'id' => 31,
                    'name' => 'Board of Inquiry - Regiment',
                    'file_category_id' => 3,
                ],
                [
                    'id' => 32,
                    'name' => 'Board of Inquiry - Coast Guard',
                    'file_category_id' => 3,
                ],
                [
                    'id' => 33,
                    'name' => 'Commission Board',
                    'file_category_id' => 3,
                ],
                [
                    'id' => 34,
                    'name' => 'Board of Survey',
                    'file_category_id' => 3,
                ],
//4.	Conferences/Committee/meetings
                [
                    'id' => 41,
                    'name' => 'Foreign',
                    'file_category_id' => 4,
                ],
                [
                    'id' => 42,
                    'name' => 'Local',
                    'file_category_id' => 4,
                ],
//5.	Funerals/War Graves
                [
                    'id' => 51,
                    'name' => 'Military Funeral',
                    'file_category_id' => 5,
                ],
                [
                    'id' => 52,
                    'name' => 'State Funerals',
                    'file_category_id' => 5,
                ],
                [
                    'id' => 53,
                    'name' => 'War graves',
                    'file_category_id' => 5,
                ],

//6.	Government Officials
                [
                    'id' => 61,
                    'name' => 'Head of State/Ministries',
                    'file_category_id' => 6,
                ],
                [
                    'id' => 62,
                    'name' => 'Ambassador / High Commission',
                    'file_category_id' => 6,
                ],
//7.	Financial & Accounting Matters
                [
                    'id' => 71,
                    'name' => 'Estimates',
                    'file_category_id' => 7,
                ],
                [
                    'id' => 72,
                    'name' => 'Allowance',
                    'file_category_id' => 7,
                ],
                [
                    'id' => 73,
                    'name' => 'Pay Matters',
                    'file_category_id' => 7,
                ],
                [
                    'id' => 74,
                    'name' => 'Tenders Board Request / Approval',
                    'file_category_id' => 7,
                ],
                [
                    'id' => 75,
                    'name' => 'Funds',
                    'file_category_id' => 7,
                ],

//8.	Operations
                [
                    'id' => 81,
                    'name' => 'Exercise',
                    'file_category_id' => 8,
                ],
                [
                    'id' => 82,
                    'name' => 'Patrols',
                    'file_category_id' => 8,
                ],
//9.	Parades
                [
                    'id' => 91,
                    'name' => 'Internal',
                    'file_category_id' => 9,
                ],
                [
                    'id' => 92,
                    'name' => 'National / Ceremonial',
                    'file_category_id' => 9,
                ],
//10.	Personnel
                [
                    'id' => 101,
                    'name' => 'Civilian Employees',
                    'file_category_id' => 10,
                ],
                [
                    'id' => 102,
                    'name' => 'Classifications',
                    'file_category_id' => 10,
                ],
                [
                    'id' => 103,
                    'name' => 'Confidential Reports',
                    'file_category_id' => 10,
                ],
                [
                    'id' => 104,
                    'name' => 'Disciplinary Matters',
                    'file_category_id' => 10,
                ],
                [
                    'id' => 105,
                    'name' => 'Court Martial',
                    'file_category_id' => 10,
                ],
                [
                    'id' => 106,
                    'name' => 'Dress',
                    'file_category_id' => 10,
                ],
                [
                    'id' => 107,
                    'name' => 'Welfare & Entertainment',
                    'file_category_id' => 10,
                ],
                [
                    'id' => 108,
                    'name' => 'Insurance',
                    'file_category_id' => 10,
                ],
                [
                    'id' => 109,
                    'name' => 'Leave',
                    'file_category_id' => 10,
                ],
                [
                    'id' => 1010,
                    'name' => 'Recommendation / Commendation / Donations in the Defence Force',
                    'file_category_id' => 10,
                ],
                [
                    'id' => 1011,
                    'name' => 'Attendance to Civil Courts',
                    'file_category_id' => 10,
                ],
//11.	Establishment
                [
                    'id' => 111,
                    'name' => 'Recruitment',
                    'file_category_id' => 11,
                ],
                [
                    'id' => 112,
                    'name' => 'Discharge / Retirement / Resignation',
                    'file_category_id' => 11,
                ],
                [
                    'id' => 113,
                    'name' => 'Promotions',
                    'file_category_id' => 11,
                ],
                [
                    'id' => 114,
                    'name' => 'Personal File - TTR Officers',
                    'file_category_id' => 11,
                ],
                [
                    'id' => 115,
                    'name' => 'Personal File - TTCG Officers',
                    'file_category_id' => 11,
                ],
                [
                    'id' => 116,
                    'name' => 'Transfers',
                    'file_category_id' => 11,
                ],
//12.	Training
                [
                    'id' => 121,
                    'name' => 'Foreign Training',
                    'file_category_id' => 12,
                ],
                [
                    'id' => 122,
                    'name' => 'Local Training',
                    'file_category_id' => 12,
                ],
//13.	Sports
                [
                    'id' => 131,
                    'name' => 'Local / Regional / International',
                    'file_category_id' => 13,
                ],
//14.	Security
                [
                    'id' => 141,
                    'name' => 'Government Buildings',
                    'file_category_id' => 14,
                ],
                [
                    'id' => 142,
                    'name' => 'Guards',
                    'file_category_id' => 14,
                ],
                [
                    'id' => 143,
                    'name' => 'Caribbean Security (Regional Security System)',
                    'file_category_id' => 14,
                ],
                [
                    'id' => 144,
                    'name' => 'Caribbean Island National Security Conference (CINSEC)',
                    'file_category_id' => 14,
                ],
//15.	Volunteer Defence Force
                [
                    'id' => 151,
                    'name' => 'Regiment',
                    'file_category_id' => 15,
                ],
                [
                    'id' => 152,
                    'name' => 'Coast Guard',
                    'file_category_id' => 15,
                ],
                [
                    'id' => 153,
                    'name' => 'Air Guard',
                    'file_category_id' => 15,
                ],
//16.	Medical & Dental
                [
                    'id' => 161,
                    'name' => 'Medical Officers',
                    'file_category_id' => 16,
                ],
                [
                    'id' => 162,
                    'name' => 'Medical Matters',
                    'file_category_id' => 16,
                ],
                [
                    'id' => 163,
                    'name' => 'Medical Board',
                    'file_category_id' => 16,
                ],

            ];

            FileSubcategory::insert($fileSubcategories);
        }
    }
}
