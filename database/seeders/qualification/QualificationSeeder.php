<?php


namespace Database\Seeders\qualification;


use Database\Seeders\qualification\course\CourseCourseInstitutionSeeder;
use Database\Seeders\qualification\course\CourseSeeder;
use Database\Seeders\qualification\education\EducationGradesSeeder;
use Database\Seeders\qualification\education\EducationLevelsSeeder;
use Database\Seeders\qualification\education\school\SchoolSeeder;
use Database\Seeders\qualification\education\subject\SubjectsSeeder;
use Illuminate\Database\Seeder;

class QualificationSeeder extends Seeder
{
    public function run()
    {
        $this->call([
//            Education
            EducationLevelsSeeder::class,
            EducationGradesSeeder::class,
            SubjectsSeeder::class,
            SchoolSeeder::class,
//             Courses
            CourseSeeder::class,
            CourseCourseInstitutionSeeder::class,
        ]);
    }
}
