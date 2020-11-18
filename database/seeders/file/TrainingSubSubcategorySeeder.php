<?php
namespace Database\Seeders\file;

use App\Models\System\Universal\Polymorphic\File\FileSubSubcategory;
use Illuminate\Database\Seeder;

class TrainingSubSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $TrainingSubGroups = [
                //121. Foreign Training Programmes / Estimates
                [
                    'id' => 121,
                    'name' => 'Training Estimates Programme',
                    'file_subcategory_id' => 121,
                ],
                [
                    'id' => 1211,
                    'name' => 'Training UK and European Countries',
                    'file_subcategory_id' => 121,
                ],
                [
                    'id' => 1212,
                    'name' => 'United States of America',
                    'file_subcategory_id' => 121,
                ],
                [
                    'id' => 1213,
                    'name' => 'Canada',
                    'file_subcategory_id' => 121,
                ],
                [
                    'id' => 1214,
                    'name' => 'South American Countries',
                    'file_subcategory_id' => 121,
                ],
                [
                    'id' => 1215,
                    'name' => 'Caribbean Countries',
                    'file_subcategory_id' => 121,
                ],
                [
                    'id' => 1216,
                    'name' => 'Course Reports – Officers',
                    'file_subcategory_id' => 121,
                ],
                [
                    'id' => 1217,
                    'name' => 'Course Reports – Other Ranks/Ratings',
                    'file_subcategory_id' => 121,
                ],
                [
                    'id' => 1218,
                    'name' => 'Movement Instructions',
                    'file_subcategory_id' => 121,
                ],
                [
                    'id' => 1219,
                    'name' => 'Small Units Exchange Canada / Exchange of Troops',
                    'file_subcategory_id' => 121,
                ],
                [
                    'id' => 12110,
                    'name' => 'Scholarship',
                    'file_subcategory_id' => 121,
                ],

                //122. Local

                [
                    'id' => 1221,
                    'name' => 'Resettlement Training',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 1222,
                    'name' => 'In-service Training',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 1223,
                    'name' => 'Physical Training Instructors Course',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 1224,
                    'name' => 'Central Training Unit Course (CTU/O & M)	',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 1225,
                    'name' => 'Joint Services Staff College Course',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 1226,
                    'name' => 'Cadre / Infantry Training / Fitness Trg / WO Course',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 1227,
                    'name' => 'Clerks Course / Signals',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 1228,
                    'name' => 'Training Policy',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 1229,
                    'name' => 'Scholarships',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 12210,
                    'name' => 'Assistance to Units with Training',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 12211,
                    'name' => 'Recruitment Training',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 12212,
                    'name' => 'Assistance to Gov’t Department / Schools with Training/YTEPP',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 12213,
                    'name' => 'Officer Cadet Training',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 12214,
                    'name' => 'Computer Training',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 12215,
                    'name' => 'Airwing Pilot',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 12216,
                    'name' => 'Small Arms Course',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 12217,
                    'name' => 'Assistance / Training by Foreign Personnel / Assistance / Training by Local Personnel',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 12218,
                    'name' => 'Training / Seminars / Workshops',
                    'file_subcategory_id' => 122,
                ],
                [
                    'id' => 12219,
                    'name' => 'National Training Agency (NTA)',
                    'file_subcategory_id' => 122,
                ],


            ];

            FileSubSubcategory::insert($TrainingSubGroups);
        }
    }
}
