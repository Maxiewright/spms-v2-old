<?php
namespace Database\Seeders\qualification\course;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseCourseInstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function (){
            DB::table('course_course_institution')->insert([
//            AlC
                [ 'course_institution_id' => 1 , 'course_id' => 1, ],
                [ 'course_institution_id' => 1 , 'course_id' => 2, ],
                [ 'course_institution_id' => 1 , 'course_id' => 3, ],
                [ 'course_institution_id' => 1 , 'course_id' => 4, ],
                [ 'course_institution_id' => 1 , 'course_id' => 5, ],
//            Fort Benning
                [ 'course_institution_id' => 2 , 'course_id' => 3, ],
                [ 'course_institution_id' => 2 , 'course_id' => 5, ],
                [ 'course_institution_id' => 2 , 'course_id' => 6, ],
//            Fort Leonard Wood
                [ 'course_institution_id' => 3 , 'course_id' => 5, ],
//            Sandhurst
                [ 'course_institution_id' => 4 , 'course_id' => 5, ],
//            Infantry Battle school
                [ 'course_institution_id' => 5 , 'course_id' => 1, ],
                [ 'course_institution_id' => 5 , 'course_id' => 2, ],
                [ 'course_institution_id' => 5 , 'course_id' => 3, ],
                [ 'course_institution_id' => 5 , 'course_id' => 5, ],
                [ 'course_institution_id' => 5 , 'course_id' => 6, ],
//                Crestcom International
                [ 'course_institution_id' => 6 , 'course_id' => 7, ],
            ]);
        });

    }
}
