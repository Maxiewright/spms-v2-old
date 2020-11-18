<?php
namespace Database\Seeders\file;

use App\Models\System\Universal\Polymorphic\File\FileCategory;
use Illuminate\Database\Seeder;

class FileCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $fileCategories = [
                [
                    'id' => 1,
                    'name' => 'Accommodation',
                    'description' => ''
                ],
                [
                    'id' => 2,
                    'name' => 'Administration',
                    'description' => ''
                ],
                [
                    'id' => 3,
                    'name' => 'Boards',
                    'description' => ''
                ],
                [
                    'id' => 4,
                    'name' => 'Conference/Committe meetings',
                    'description' => ''
                ],
                [
                    'id' => 5,
                    'name' => 'Funerals/War Graves',
                    'description' => ''
                ],
                [
                    'id' => 6,
                    'name' => 'Government Officials',
                    'description' => ''
                ],
                [
                    'id' => 7,
                    'name' => 'Financial and Accounting Matters',
                    'description' => ''
                ],
                [
                    'id' => 8,
                    'name' => 'Operations',
                    'description' => ''
                ],
                [
                    'id' => 9,
                    'name' => 'parades',
                    'description' => ''
                ],
                [
                    'id' => 10,
                    'name' => 'Personnel',
                    'description' => ''
                ],
                [
                    'id' => 11,
                    'name' => 'Establishment',
                    'description' => ''
                ],
                [
                    'id' => 12,
                    'name' => 'Training',
                    'description' => ''
                ],
                [
                    'id' => 13,
                    'name' => 'Sports',
                    'description' => ''
                ],
                [
                    'id' => 14,
                    'name' => 'Security',
                    'description' => ''
                ],
                [
                    'id' => 15,
                    'name' => 'Volunteer Defence Force',
                    'description' => ''
                ],
                [
                    'id' => 16,
                    'name' => 'Medical & Dental',
                    'description' => ''
                ],
            ];

            FileCategory::insert($fileCategories);
        }
    }
}
