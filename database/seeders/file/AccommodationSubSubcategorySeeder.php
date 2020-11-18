<?php
namespace Database\Seeders\file;

use App\Models\System\Universal\Polymorphic\File\FileSubSubcategory;
use Illuminate\Database\Seeder;

class AccommodationSubSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $accommodationSubGroups = [
                //11.	Camps
                [
                    'id' => 111,
                    'name' => 'Teteron Barracks',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 112,
                    'name' => 'Camp Ogden',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 113,
                    'name' => 'Closed Camps (Union Hall, Siparia, Centeno, Point Lisas)',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 114,
                    'name' => 'Crows Nest - RHQ',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 115,
                    'name' => 'Camp Galeota',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 116,
                    'name' => 'Tobago Camp',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 117,
                    'name' => 'Wallerfield / Camp Cumuto',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 118,
                    'name' => 'Mausica',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 119,
                    'name' => 'La Romaine',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1110,
                    'name' => 'Relocation of Camp Signal Hill / Hope Estate in Tobago',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1111,
                    'name' => 'Point a Pierre (Proposed Camp)',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1112,
                    'name' => 'Staubles Bay',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1113,
                    'name' => 'Air Guard - Piarco',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1114,
                    'name' => 'DFHQ / CDA ? Chaguaramas Area',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1115,
                    'name' => 'Harts Cut(TTCG)',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1116,
                    'name' => 'Heliport / National Helicopter Services Limited',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1117,
                    'name' => 'Development of CG Base/ Morne St Catherine / Pt Lisas',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1118,
                    'name' => 'Volunteer Defence Force - South',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1119,
                    'name' => 'Air Strip - Point Fortin' ,
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1120,
                    'name' => 'Camp Mucurapo',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1121,
                    'name' => 'Camp Signal hill',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1122,
                    'name' => 'Cedros Security Complex',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1123,
                    'name' => 'Proposed TTCG Base - San Fernando',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1124,
                    'name' => 'Camp Omega',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1125,
                    'name' => 'Proposed Military Base in South / Location RHQ',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1126,
                    'name' => 'Proposed Military Base in Couva',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1127,
                    'name' => 'Joint Operations Command Centre',
                    'file_subcategory_id' => 11,
                ],
                [
                    'id' => 1128,
                    'name' => 'President / Prime Minister (Guard Quarters)',
                    'file_subcategory_id' => 11,
                ],


                //12.   Housing

                [
                    'id' => 121,
                    'name' => 'Government Quarters(Grandwood, Diamond Vale, Macqueripe, Petit Valley, Flag Staff)',
                    'file_subcategory_id' => 12,
                ],
                [
                    'id' => 122,
                    'name' => 'Private Hiring',
                    'file_subcategory_id' => 12,
                ],
                [
                    'id' => 123,
                    'name' => '',
                    'file_subcategory_id' => 12,
                ],
                [
                    'id' => 124,
                    'name' => 'National Housing ',
                    'file_subcategory_id' => 12,
                ],
                [
                    'id' => 125,
                    'name' => 'Assistance to purchase Land and House',
                    'file_subcategory_id' => 12,
                ],
                [
                    'id' => 126,
                    'name' => 'Casualty Report',
                    'file_subcategory_id' => 12,
                ],
                [
                    'id' => 127,
                    'name' => 'Illegal Operation of Defence Force Quarters',
                    'file_subcategory_id' => 12,
                ],
                [
                    'id' => 128,
                    'name' => 'Officers Rest House / Bachelor Quarters (BOQ)',
                    'file_subcategory_id' => 12,
                ],
                [
                    'id' => 129,
                    'name' => 'Defence Force Housing Scheme',
                    'file_subcategory_id' => 12,
                ],
            ];

            FileSubSubcategory::insert($accommodationSubGroups);
        }
    }
}
