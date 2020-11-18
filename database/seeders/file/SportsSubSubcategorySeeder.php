<?php
namespace Database\Seeders\file;
use App\Models\System\Universal\Polymorphic\File\FileSubSubcategory;
use Illuminate\Database\Seeder;

class SportsSubSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $SportsSubGroups = [
                // 131. Local/Regional/International

                [
                    'id' => 1311,
                    'name' => 'Sports Policy / Defence Force Sports',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 1312,
                    'name' => 'Athletics / Triathlon',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 1313,
                    'name' => 'Badminton',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 1314,
                    'name' => 'Boxing',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 1315,
                    'name' => 'Cricket',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 1316,
                    'name' => 'Defence Force Sports Academy',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 1317,
                    'name' => 'Football',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 1318,
                    'name' => 'Olympic / Special Olympics',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 1319,
                    'name' => 'Gymnastics / Karate',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 13110,
                    'name' => 'Hockey',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 13111,
                    'name' => 'Netball	',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 13112,
                    'name' => 'TTR / TTCG Sports',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 13113,
                    'name' => 'Power Boat Racing / Yachting',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 13114,
                    'name' => 'Rugby',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 13115,
                    'name' => 'Shooting / Trap & Skeet / Trinidad Rifle Association',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 13116,
                    'name' => 'Swimming / Aquatics',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 13117,
                    'name' => 'Table Tennis / Lawn Tennis',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 13118,
                    'name' => 'Volleyball',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 13119,
                    'name' => 'Cycling',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 13120,
                    'name' => 'Basketball',
                    'file_subcategory_id' => 131,
                ],[
                    'id' => 13121,
                    'name' => 'Weight Training / Body Building',
                    'file_subcategory_id' => 131,
                ],
                [
                    'id' => 13122,
                    'name' => 'Ministry of National Security Sports',
                    'file_subcategory_id' => 131,
                ],



            ];

            FileSubSubcategory::insert($SportsSubGroups);
        }
    }
}
