<?php
namespace Database\Seeders\medical;

use App\Models\System\Serviceperson\Medical\MedicalClassificationGrade;
use Illuminate\Database\Seeder;

class MedicalClassificationGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = [
            [
                'degree' => 'One',
                'description' => null,
            ],
            [
                'degree' => 'Two',
                'description' => null,
            ],
            [
                'degree' => 'Three',
                'description' => null,
            ],
            [
                'degree' => 'Four',
                'description' => null,
            ],
            [
                'degree' => 'Five',
                'description' => null,
            ],
            [
                'degree' => 'Six',
                'description' => null,
            ],
            [
                'degree' => 'Seven',
                'description' => null,
            ],
            [
                'degree' => 'Eight',
                'description' => null,
            ],
        ];
        MedicalClassificationGrade::insert($grades);
    }
}
