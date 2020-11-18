<?php
namespace Database\Seeders\qualification\course;

use App\Models\System\Serviceperson\Qualifications\Course\Course;
use App\Models\System\Serviceperson\Qualifications\Course\CourseInstitution;
use App\Models\System\Serviceperson\Qualifications\Course\CourseQualification;
use App\Models\System\Serviceperson\Qualifications\Course\CourseType;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ********************************************* Course type **************************************************
        {
            $courseTypes = [
                [
                    'name' => 'Civilian(Local)',
                    'slug' => 'LC',
                    'created_at' => '2020-02-17 08:00:00',
                ],
                [
                    'name' => 'Military(Local)',
                    'slug' => 'LM',
                    'created_at' => '2020-02-17 08:00:00',
                ],
                [
                    'name' => 'Foreign Military',
                    'slug' => 'FM',
                    'created_at' => '2020-02-17 08:00:00',
                ],
                [
                    'name' => 'Foreign Civilian',
                    'slug' => 'FC',
                    'created_at' => '2020-02-17 08:00:00',
                ],
                [
                    'name' => 'Other',
                    'slug' => 'Other',
                    'created_at' => '2020-02-17 08:00:00',
                ],
            ];
            CourseType::insert($courseTypes);
        }
        // ******************************************** Course Institution *********************************************
        {
            $courseInstitutions = [
                [
                    'name' => 'Army Learning Center',
                    'slug' => 'ALC',
                    'course_type_id' => 2,
                    'description' => null,
                    'created_at' => '2020-02-17 10:00:00',
                ],
                [
                    'name' => 'U.S. Army Fort Benning',
                    'slug' => 'Fort Benning',
                    'course_type_id' => 3,
                    'description' => null,
                    'created_at' => '2020-02-17 10:00:00',
                ],
                [
                    'name' => 'US Army Fort Leonard Wood',
                    'slug' => 'Fort Leonard Wood',
                    'course_type_id' => 3,
                    'description' => null,
                    'created_at' => '2020-02-17 10:00:00',
                ],
                [
                    'name' => 'British Army - Royal Military Academy Sandhurst',
                    'slug' => 'Sandhurst',
                    'course_type_id' => 3,
                    'description' => null,
                    'created_at' => '2020-02-17 10:00:00',
                ],
                [
                    'name' => 'British Army - Infantry Battle School',
                    'slug' => 'IBS',
                    'course_type_id' => 3,
                    'description' => null,
                    'created_at' => '2020-02-17 10:00:00',
                ],
                [
                    'name' => 'Crestcom Trinidad and Tobago',
                    'slug' => 'Crestcom',
                    'course_type_id' => 1,
                    'description' => null,
                    'created_at' => '2020-02-17 10:00:00',
                ],

            ];
            CourseInstitution::insert($courseInstitutions);
        }
        // ************************************************ Courses ****************************************************
        {
            $courses = [
                [
                    'name' => 'Basic NCO Professional Development Course',
                    'slug' => 'BNPDC',
                    'description' => null,
                    'created_at' => '2020-02-17 10:00:00',
                ],
                [
                    'name' => 'Advance NCO Professional Development Course',
                    'slug' => 'ANPDC',
                    'description' => null,
                    'created_at' => '2020-02-17 10:00:00',
                ],
                [

                    'name' => 'Senior Leaders Course',
                    'slug' => 'SLC',
                    'description' => null,
                    'created_at' => '2020-02-17 10:00:00',
                ],
                [

                    'name' => 'Basic Recruit Training',
                    'slug' => 'BRT',
                    'description' => null,
                    'created_at' => '2020-02-17 10:00:00',
                ],
                [

                    'name' => 'Basic Officer Training Course',
                    'slug' => 'BOTC',
                    'description' => null,
                    'created_at' => '2020-02-17 10:00:00',
                ],
                [

                    'name' => 'Range Course',
                    'slug' => 'Range Course',
                    'description' => null,
                    'created_at' => '2020-02-17 10:00:00',
                ],
                [

                    'name' => 'Bullet Proof Managers Course',
                    'slug' => 'Bullet Proof Manager',
                    'description' => null,
                    'created_at' => '2020-02-17 10:00:00',
                ],
            ];
            Course::insert($courses);
        }
        // **************************************** Qualification Obtained *********************************************
        {
            $qualifications = [
                [
                    'name' => 'Attended',
                    'slug' => 'Att',
                    'description' => null,
                    'created_at' => '2020-02-17 10:20:00',
                ],
                [
                    'name' => 'Passed',
                    'slug' => 'Pass',
                    'description' => null,
                    'created_at' => '2020-02-17 10:20:00',
                ],
                [
                    'name' => 'Certificate of Participation',
                    'slug' => 'Cert',
                    'description' => null,
                    'created_at' => '2020-02-17 10:20:00',
                ],
                [
                    'name' => 'Diploma',
                    'slug' => 'Dip',
                    'description' => null,
                    'created_at' => '2020-02-17 10:20:00',
                ],
            ];
            CourseQualification::insert($qualifications);
        }
    }
}
