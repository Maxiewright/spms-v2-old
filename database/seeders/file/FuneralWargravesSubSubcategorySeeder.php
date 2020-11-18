<?php
namespace Database\Seeders\file;

use App\Models\System\Universal\Polymorphic\File\FileSubSubcategory;
use Illuminate\Database\Seeder;

class FuneralWargravesSubSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $funeralwargravesSubGroups = [
                //51.	Military Funerals
                [
                    'id' => 511,
                    'name' => 'Military Funerals (Policy)',
                    'file_subcategory_id' => 51,
                ],
                [
                    'id' => 512,
                    'name' => '4214 Sgt Rogers G',
                    'file_subcategory_id' => 51,
                ],
                [
                    'id' => 513,
                    'name' => '8099 Pte Cozier Kurt',
                    'file_subcategory_id' => 51,
                ],
                [
                    'id' => 514,
                    'name' => 'Pte Salandy R',
                    'file_subcategory_id' => 51,
                ],
                [
                    'id' => 515,
                    'name' => '4930 Pte Charles M',
                    'file_subcategory_id' => 51,
                ],
                [
                    'id' => 516,
                    'name' => '3625 Sgt Ramsey C',
                    'file_subcategory_id' => 51,
                ],
                [
                    'id' => 517,
                    'name' => '3886 Sgt Charles CS',
                    'file_subcategory_id' => 51,
                ],
                [
                    'id' => 518,
                    'name' => '8670 Pte Lake C',
                    'file_subcategory_id' => 51,
                ],
                [
                    'id' => 519,
                    'name' => '783 PO Parasram S',
                    'file_subcategory_id' => 51,
                ],
                [
                    'id' => 5110,
                    'name' => 'Lt A Reid',
                    'file_subcategory_id' => 51,
                ],
                [
                    'id' => 5111,
                    'name' => 'FCPO Donawa',
                    'file_subcategory_id' => 51,
                ],
                [
                    'id' => 5112,
                    'name' => '8623 Pte Chaitoo T',
                    'file_subcategory_id' => 51,
                ],
                [
                    'id' => 5113,
                    'name' => '8745 Pte Charles R',
                    'file_subcategory_id' => 51,
                ],
                [
                    'id' => 5114,
                    'name' => 'FR E Mahabir',
                    'file_subcategory_id' => 51,
                ],
                [
                    'id' => 5115,
                    'name' => 'Pte Bostic C',
                    'file_subcategory_id' => 51,
                ],
                [
                    'id' => 5116,
                    'name' => '4495 Pte Wight D',
                    'file_subcategory_id' => 51,
                ],

                //52.	State Funerals

                [
                    'id' => 521,
                    'name' => 'State Funerals – Policy',
                    'file_subcategory_id' => 52,
                ],

                //52.	War Graves

                [
                    'id' => 531,
                    'name' => 'Commonwealth War Graves',
                    'file_subcategory_id' => 53,
                ],

            ];

            FileSubSubcategory::insert($funeralwargravesSubGroups);
        }
    }
}
