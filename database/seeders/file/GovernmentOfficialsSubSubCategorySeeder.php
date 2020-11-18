<?php
namespace Database\Seeders\file;

use App\Models\System\Universal\Polymorphic\File\FileSubSubcategory;
use Illuminate\Database\Seeder;

class GovernmentOfficialsSubSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $governmentofficialsSubGroups = [
                //61.	Head of State/Ministries
                [
                    'id' => 611,
                    'name' => 'His Excellency the President – Military Staff	',
                    'file_subcategory_id' => 61,
                ],
                [
                    'id' => 612,
                    'name' => 'Programme of Events of His Excellency',
                    'file_subcategory_id' => 61,
                ],
                [
                    'id' => 613,
                    'name' => 'Aid-de-Camp (ADC) to His Excellency',
                    'file_subcategory_id' => 61,
                ],
                [
                    'id' => 614,
                    'name' => 'The Honourable Prime Minister – Military Staff',
                    'file_subcategory_id' => 61,
                ],
                [
                    'id' => 615,
                    'name' => 'Ministers',
                    'file_subcategory_id' => 61,
                ],

                //62. Ambassador High Commissions

                [
                    'id' => 621,
                    'name' => 'Diplomats and Consular Corps',
                    'file_subcategory_id' => 62,
                ],
                [
                    'id' => 622,
                    'name' => 'Military Attaché - USA',
                    'file_subcategory_id' => 62,
                ],
                [
                    'id' => 623,
                    'name' => 'Military Attaché – United Kingdom',
                    'file_subcategory_id' => 62,
                ],
                [
                    'id' => 624,
                    'name' => 'Foreign Military Attaché/Postings',
                    'file_subcategory_id' => 62,
                ],
                [
                    'id' => 625,
                    'name' => 'Defence Attaché Venezuela',
                    'file_subcategory_id' => 62,
                ],
            ];

            FileSubSubcategory::insert($governmentofficialsSubGroups);
        }
    }
}
