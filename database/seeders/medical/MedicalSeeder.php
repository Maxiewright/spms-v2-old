<?php


namespace Database\Seeders\medical;


use Illuminate\Database\Seeder;

class MedicalSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BiodataSeeder::class,
            MedicalHistorySeeder::class,
            MedicalClassificationGradeSeeder::class,
        ]);
    }
}
