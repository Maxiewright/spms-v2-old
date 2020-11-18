<?php
namespace Database\Seeders\qualification\education\subject;

use App\Models\System\Serviceperson\Qualifications\Education\Subject;
use Illuminate\Database\Seeder;

class CSECSubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csecSubjects = [
            [
                'name' => 'Additional Mathematics',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Agricultural Science',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Biology',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Caribbean History',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Certificate in Business Studies',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' =>  'Chemistry',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Economics',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Electronic Document Preparation and Management (EDPM)',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'English',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Geography',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Home Economics',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Human and Social Biology',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Industrial Technology',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Information Technology',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Integrated Science',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Mathematics',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Modern Languages',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Music',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Office Administration',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Physical Education and Sport',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Physics',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Principles of Accounts',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Principles of Business',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Religious Education',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Social Studies',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Technical Drawing',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Theatre Arts',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Visual Arts',
                'education_level_id' => 1,
                'created_at' => '2020-08-05 20:00:00'
            ],

        ];
        Subject::insert($csecSubjects);
    }
}
