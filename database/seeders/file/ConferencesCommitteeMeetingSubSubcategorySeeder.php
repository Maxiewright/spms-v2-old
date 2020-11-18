<?php
namespace Database\Seeders\file;

use App\Models\System\Universal\Polymorphic\File\FileSubSubcategory;
use Illuminate\Database\Seeder;

class ConferencesCommitteeMeetingSubSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $conferencescommitteemeetingSubGroups = [
                //41.	Foreign
                [
                    'id' => 41,
                    'name' => 'Caribbean Development and Co-operation',
                    'file_subcategory_id' => 41,
                ],
                [
                    'id' => 411,
                    'name' => 'Committee Meetings',
                    'file_subcategory_id' => 41,
                ],
                [
                    'id' => 412,
                    'name' => 'American Armies Conference',
                    'file_subcategory_id' => 41,
                ],
                [
                    'id' => 413,
                    'name' => 'United Nations Conference',
                    'file_subcategory_id' => 41,
                ],
                [
                    'id' => 414,
                    'name' => 'Heads of Caricom Government Conference/Wives of Heads of State and Government of America/Organisation of American States',
                    'file_subcategory_id' => 41,
                ],
                [
                    'id' => 415,
                    'name' => 'Military Conferences/Seminars',
                    'file_subcategory_id' => 41,
                ],
                [
                    'id' => 416,
                    'name' => 'Caribbean Drug Conference (PMO)',
                    'file_subcategory_id' => 41,
                ],
                [
                    'id' => 417,
                    'name' => 'CG Commanders Conference',
                    'file_subcategory_id' => 41,
                ],
                [
                    'id' => 418,
                    'name' => '(CICAD) Inter-American Drug Abuse Control Commission',
                    'file_subcategory_id' => 41,
                ],
                [
                    'id' => 419,
                    'name' => '(1st Annual) Caribbean Nations Maritime Law Conference',
                    'file_subcategory_id' => 41,
                ],


                //42.   Local

                [
                    'id' => 421,
                    'name' => 'Chief of Defence Staff Conference',
                    'file_subcategory_id' => 42,
                ],
                [
                    'id' => 422,
                    'name' => 'Unit CO’s Conference – TTR',
                    'file_subcategory_id' => 42,
                ],
                [
                    'id' => 423,
                    'name' => 'Unit CO’s Conference – CG',
                    'file_subcategory_id' => 42,
                ],
                [
                    'id' => 424,
                    'name' => 'Strategic Planning Conference',
                    'file_subcategory_id' => 42,
                ],
                [
                    'id' => 425,
                    'name' => 'Welfare Committee Meetings – Defence Force',
                    'file_subcategory_id' => 42,
                ],
                [
                    'id' => 426,
                    'name' => 'Piarco and Crown Point Airports Conference',
                    'file_subcategory_id' => 42,
                ],
                [
                    'id' => 427,
                    'name' => 'Seminars / Conferences in the Public Service/Law of Armed Conflict (Local)',
                    'file_subcategory_id' => 42,
                ],
                [
                    'id' => 428,
                    'name' => 'Defence Council Meetings',
                    'file_subcategory_id' => 42,
                ],
                [
                    'id' => 429,
                    'name' => 'DFHQ Officers Meetings / Defence Force Officer Meeting',
                    'file_subcategory_id' => 42,
                ],
                [
                    'id' => 4210,
                    'name' => 'Minister of National Security / TTDF / Protective Services / Head of Division',
                    'file_subcategory_id' => 42,
                ],
                [
                    'id' => 4211,
                    'name' => 'Minutes / Meeting Civil Organisation',
                    'file_subcategory_id' => 42,
                ],
                [
                    'id' => 4212,
                    'name' => 'Anniversary Celebrations Committee Meetings',
                    'file_subcategory_id' => 42,
                ],
                [
                    'id' => 4213,
                    'name' => 'Meeting of Tenders Committee within MNS – Special Tenders',
                    'file_subcategory_id' => 42,
                ],
                [
                    'id' => 4214,
                    'name' => 'Steering Committee Civilian Conservation Corps',
                    'file_subcategory_id' => 42,
                ],
                [
                    'id' => 4215,
                    'name' => 'Review 1990 Coup Attempt',
                    'file_subcategory_id' => 42,
                ],
                [
                    'id' => 4216,
                    'name' => 'Air Advisory Board',
                    'file_subcategory_id' => 42,
                ],
                [
                    'id' => 4217,
                    'name' => 'NCC Security Committee',
                    'file_subcategory_id' => 42,
                ],
            ];

            FileSubSubcategory::insert($conferencescommitteemeetingSubGroups);
        }
    }
}
