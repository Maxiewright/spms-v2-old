<?php
namespace Database\Seeders\qualification\education\subject;

use App\Models\System\Serviceperson\Qualifications\Education\Subject;
use Illuminate\Database\Seeder;

class CAPESubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $capeSubjects = [

            [
                'name' => 'Accounting',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Animation & Game Design',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Agricultural Science',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Applied Mathematics',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Art and Design',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Biology',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Building and Mechanical Engineering Drawing',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Caribbean Studies',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Chemistry',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Communication Studies',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Computer Science',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Digital Media',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Electrical and Electronic Engineering Technology',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Economics',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Entrepreneurship',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Environmental Science',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Financial Services Studies',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Food and Nutrition',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'French',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Geography',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Green Engineering',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'History',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Information Technology',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Integrated Mathematics',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Law',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Literatures in English',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Logistics and Supply Chain Operations',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Management of Business',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Performing Arts',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Physics',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Physical Education and Sport',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Pure Mathematics',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Sociology',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Spanish',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
            [
                'name' => 'Tourism',
                'education_level_id' => 2,
                'created_at' => '2020-08-05 20:00:00'
            ],
        ];
        Subject::insert($capeSubjects);
    }
}
