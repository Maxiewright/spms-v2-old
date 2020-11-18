<?php
namespace Database\Seeders\qualification\education;

use App\Models\System\Serviceperson\Qualifications\Education\EducationLevel;
use Illuminate\Database\Seeder;

class EducationLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $educationLevels = [
            [
                'name' => 'CSEC (O Levels)',
                'slug' => 'CSEC',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
            [
                'name' => 'CAPE (A Levels)',
                'slug' => 'CAPE',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
            [
                'name' => 'Certificate',
                'slug' => 'Cert',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
            [
                'name' => 'Diploma',
                'slug' => 'Dip',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
            [
                'name' => 'Associate of Arts',
                'slug' => 'A.A.',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
            [
                'name' => 'Associate of Science',
                'slug' => 'A.S.',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
            [
                'name' => 'Bachelor of Arts',
                'slug' => 'BA',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
            [
                'name' => 'Bachelor of Science',
                'slug' => 'B.S.',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
            [
                'name' => 'Bachelor of Fine Arts',
                'slug' => 'B.F.A.',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
            [
                'name' => 'Bachelor of Architecture',
                'slug' => 'B.Arch',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
            [
                'name' => 'Bachelor of Science in Nursing',
                'slug' => 'BSN',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
            [
                'name' => 'Bachelor of Engineering',
                'slug' => 'BE',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
            [
                'name' => 'Master of Arts',
                'slug' => 'M.A.',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
            [
                'name' => 'Master of Business Administration',
                'slug' => 'M.B.A',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
            [
                'name' => 'Master of Science',
                'slug' => 'M.S.',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
            [
                'name' => 'Master of Social Work',
                'slug' => 'M.S.W',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
            [
                'name' => 'Doctor of Philosophy',
                'slug' => 'Ph.D',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
            [
                'name' => 'Doctor of Psychology',
                'slug' => 'Psy.D',
                'description' => null,
                'created_at' => '2020-02-17 04:55:00',
            ],
        ];
        EducationLevel::insert($educationLevels);
    }

}
