<?php
namespace Database\Seeders\qualification\education;

use App\Models\System\Serviceperson\Qualifications\Education\EducationGrade;
use Illuminate\Database\Seeder;

class EducationGradesSeeder extends Seeder
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
                'education_level_id' => 1,
                'grade' => 'I',
                'description' => 'Candidate shows a comprehensive grasp of the key concepts, knowledge, skills and competencies required by the syllabus.',
                'us_grade_equivalent' => 'A',
                'us_description' => 'Outstanding',
                'created_at' => '2020-02-17 05:10:00',
            ],
            [
                'education_level_id' => 1,
                'grade' => 'II',
                'description' => 'Candidate shows a good grasp of the key concepts, knowledge, skills and competencies required by the syllabus.',
                'us_grade_equivalent' => 'B',
                'us_description' => 'Good',
                'created_at' => '2020-02-17 05:10:00',
            ],
            [
                'education_level_id' => 1,
                'grade' => 'III',
                'description' => 'Candidate shows a fairly good grasp of the key concepts, knowledge, skills and abilities required by the syllabus.',
                'us_grade_equivalent' => 'C',
                'us_description' => 'Fairly Good',
                'created_at' => '2020-02-17 05:10:00',
            ],
            [
                'education_level_id' => 1,
                'grade' => 'IV',
                'description' => 'Candidate shows a moderate grasp of the key concepts, knowledge, skills and competencies required by the syllabus.',
                'us_grade_equivalent' => 'D',
                'us_description' => 'Moderate',
                'created_at' => '2020-02-17 05:10:00',
            ],
            [
                'education_level_id' => 1,
                'grade' => 'V',
                'description' => 'Candidate shows a very limited grasp of the key concepts, knowledge, skills and competencies required by the syllabus.',
                'us_grade_equivalent' => 'E',
                'us_description' => 'Weak',
                'created_at' => '2020-02-17 05:10:00',
            ],
            [
                'education_level_id' => 1,
                'grade' => 'VI',
                'description' => 'Candidate shows a very limited grasp of the key concepts, knowledge, skills and competencies required by the syllabus.',
                'us_grade_equivalent' => 'F',
                'us_description' => 'Poor',
                'created_at' => '2020-02-17 05:10:00',
            ],

        ];
        EducationGrade::insert($grades);
    }
}
