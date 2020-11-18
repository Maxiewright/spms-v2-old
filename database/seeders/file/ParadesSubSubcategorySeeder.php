<?php
namespace Database\Seeders\file;

use App\Models\System\Universal\Polymorphic\File\FileSubSubcategory;
use Illuminate\Database\Seeder;

class ParadesSubSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $ParadesSubGroups = [
                //91. Internal
                [
                    'id' => 911,
                    'name' => 'Commander in Chief of the Armed Forces / Invitation to Parade',
                    'file_subcategory_id' => 91,
                ],
                [
                    'id' => 912,
                    'name' => 'Chief of Defence Staff Parade',
                    'file_subcategory_id' => 91,
                ],
                [
                    'id' => 913,
                    'name' => 'TTR Anniversary Parade',
                    'file_subcategory_id' => 91,
                ],
                [
                    'id' => 914,
                    'name' => 'TTCG Anniversary Parade / TTAG Anniversary Parade',
                    'file_subcategory_id' => 91,
                ],
                [
                    'id' => 915,
                    'name' => 'Recruit Passing Out Parade',
                    'file_subcategory_id' => 91,
                ],
                [
                    'id' => 916,
                    'name' => 'Church Parade',
                    'file_subcategory_id' => 91,
                ],
                [
                    'id' => 917,
                    'name' => 'Divisions',
                    'file_subcategory_id' => 91,
                ],
                [
                    'id' => 918,
                    'name' => 'Officer Cadet Commissioning Parade',
                    'file_subcategory_id' => 91,
                ],
                [
                    'id' => 919,
                    'name' => 'Annual Regiment Drill Competition',
                    'file_subcategory_id' => 91,
                ],
                [
                    'id' => 9110,
                    'name' => 'Hand Over of the Command of TTDF',
                    'file_subcategory_id' => 91,
                ],
                [
                    'id' => 9111,
                    'name' => 'Regiment Scale ‘A’ Parade',
                    'file_subcategory_id' => 91,
                ],
                [
                    'id' => 9112,
                    'name' => 'Military Tattoo',
                    'file_subcategory_id' => 91,
                ],
                [
                    'id' => 9113,
                    'name' => 'Commissioning Ceremonies / Education Officer’s Parade (EO)',
                    'file_subcategory_id' => 91,
                ],

                //92. National Ceremonial

                [
                    'id' => 921,
                    'name' => 'Independence Parade / Parade Procedures',
                    'file_subcategory_id' => 92,
                ],
                [
                    'id' => 922,
                    'name' => 'Opening Law Courts',
                    'file_subcategory_id' => 92,
                ],
                [
                    'id' => 923,
                    'name' => 'Remembrance Day',
                    'file_subcategory_id' => 92,
                ],
                [
                    'id' => 924,
                    'name' => 'Opening Of Parliament',
                    'file_subcategory_id' => 92,
                ],
                [
                    'id' => 925,
                    'name' => 'Re-Consecration of Colours',
                    'file_subcategory_id' => 92,
                ],
                [
                    'id' => 926,
                    'name' => 'Republic Day Celebrations',
                    'file_subcategory_id' => 92,
                ],
                [
                    'id' => 927,
                    'name' => 'Guard of Honour / City Day Parade / Borough Day',
                    'file_subcategory_id' => 92,
                ],
            ];

            FileSubSubcategory::insert($ParadesSubGroups);
        }
    }
}
