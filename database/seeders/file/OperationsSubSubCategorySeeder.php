<?php
namespace Database\Seeders\file;

use App\Models\System\Universal\Polymorphic\File\FileSubSubcategory;
use Illuminate\Database\Seeder;

class OperationsSubSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $OperationsSubGroups = [
                //81.	Exercises
                [
                    'id' => 811,
                    'name' => 'Search and Rescue / National Helicopter',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 812,
                    'name' => 'Training Exercises – Ops Evaluation Exercise TTR / March and Shoot',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 813,
                    'name' => 'Us of Military Drug Interdiction / Eradication / Witness Protection Programme – New File 1994 / Weedeater Operations / Joint Combined Marijuana Eradication',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 814,
                    'name' => 'Exercises with Foreign Forces',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 815,
                    'name' => 'Exercises with Foreign Navies',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 816,
                    'name' => 'Joint Operations – TTDF / TTPS',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 817,
                    'name' => 'Exercise Tradewinds',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 818,
                    'name' => 'Incidents at Sea',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 819,
                    'name' => 'Caribbean Support Tenders',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 8110,
                    'name' => 'Special Naval Unit / SF / SOG',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 8111,
                    'name' => 'Cobalt Mercury (New File opened 31 July 2000)',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 8112,
                    'name' => 'Operations Orders',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 8113,
                    'name' => 'Operation Status – Coast Guard / TTR / AG',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 8114,
                    'name' => 'Exercise Ocean Venture',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 8115,
                    'name' => 'Exercise Cinnamon Post – 1992 New File 1994',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 8116,
                    'name' => 'US Army Engineer Readiness Training Exercise (ENTRE) with U&E',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 8117,
                    'name' => 'Exercise Safe Guard',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 8118,
                    'name' => 'Ops 18 Not Used',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 8119,
                    'name' => 'Operation Haiti',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 8120,
                    'name' => 'United Nations Mission in Haiti (UNMIH) (Closed 31 July 2000)',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 8121,
                    'name' => 'Operation St Kitts / CARICOM Village',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 8122,
                    'name' => 'Operation Antigua / Barbuda',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 8123,
                    'name' => 'Operation Debrief / Brief',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 8124,
                    'name' => 'Construction of Fence – Jammaat Al Muslimeen',
                    'file_subcategory_id' => 81,
                ],
                [
                    'id' => 8125,
                    'name' => '“Vincy Pac”',
                    'file_subcategory_id' => 81,
                ],

                //82. Patrols

                [
                    'id' => 821,
                    'name' => 'Ops 21 Not Used',
                    'file_subcategory_id' => 82,
                ],
                [
                    'id' => 822,
                    'name' => 'Ops 22 Not Used',
                    'file_subcategory_id' => 82,
                ],
                [
                    'id' => 823,
                    'name' => 'Town Patrol',
                    'file_subcategory_id' => 82,
                ],
                [
                    'id' => 824,
                    'name' => 'Joint Patrols with the Police',
                    'file_subcategory_id' => 82,
                ],
                [
                    'id' => 825,
                    'name' => 'Pipeline Patrols',
                    'file_subcategory_id' => 82,
                ],
                [
                    'id' => 826,
                    'name' => 'Joint Patrol – TTCG / Venezuela National Guard',
                    'file_subcategory_id' => 82,
                ],
                [
                    'id' => 827,
                    'name' => 'Vessel Status – TTCG / Vessel Status Air Craft',
                    'file_subcategory_id' => 82,
                ],
                [
                    'id' => 828,
                    'name' => 'Donation by US Government',
                    'file_subcategory_id' => 82,
                ],
                [
                    'id' => 829,
                    'name' => 'Recce Patrols / CG Vessels Patrols / Recce Patrols / Ag Patrols',
                    'file_subcategory_id' => 82,
                ],
                [
                    'id' => 8210,
                    'name' => 'Deployment of DF in Aid to Civil Power',
                    'file_subcategory_id' => 82,
                ],

            ];

            FileSubSubcategory::insert($OperationsSubGroups);
        }
    }
}
