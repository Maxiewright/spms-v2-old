<?php

namespace Modules\Medical\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Medical\Entities\MedicalClassificationGrade;

class MedicalClassificationGradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

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
