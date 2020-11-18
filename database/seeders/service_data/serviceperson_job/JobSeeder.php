<?php
namespace Database\Seeders\service_data\serviceperson_job;

use App\Models\System\Serviceperson\CareerManagement\Job\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = [
//            COTTR
            [
                'job_title_id' => 1,
                'job_class_id' => null,
                'career_path_id' => 1,
                'rank_id' => 15,
                'establishment' => 1
            ],
//            Bde 2IC
            [
                'job_title_id' => 2,
                'job_class_id' => null,
                'career_path_id' => 1,
                'rank_id' =>  14,
                'establishment' => 1
            ],
//            Commanding Officer
            [
                'job_title_id' => 3,
                'job_class_id' => null,
                'career_path_id' => 1,
                'rank_id' => 14,
                'establishment' => 5
            ],
//            Bn 2IC
            [
                'job_title_id' => 4,
                'job_class_id' => null,
                'career_path_id' => 1,
                'rank_id' => 13,
                'establishment' => 5
            ],
//            Officer Commanding
            [
                'job_title_id' => 5,
                'job_class_id' => null,
                'career_path_id' => 1,
                'rank_id' => 13,
                'establishment' => 16,
            ],
//            Coy 2IC
            [
                'job_title_id' => 6,
                'job_class_id' => null,
                'career_path_id' => 1,
                'rank_id' => 12,
                'establishment' => 16,
            ],
//            Plt Comd
            [
                'job_title_id' => 7,
                'job_class_id' => null,
                'career_path_id' =>1,
                'rank_id' => 11,
                'establishment' => 24
            ],
//          Plt Sgt
            [
                'job_title_id' => 8,
                'job_class_id' => null,
                'career_path_id' => 1,
                'rank_id' => 8,
                'establishment' => 24,
            ],
//            Sect Comd
            [
                'job_title_id' => 9,
                'job_class_id' => null,
                'career_path_id' => 1,
                'rank_id' => 4,
                'establishment' =>54
            ],
//            Sect 2IC
            [
                'job_title_id' => 10,
                'job_class_id' => null,
                'career_path_id' =>1,
                'rank_id' => 3,
                'establishment' => 54
            ],
//            Team Leader
            [
                'job_title_id' => 11,
                'job_class_id' => null,
                'career_path_id' => 1,
                'rank_id' => 3,
                'establishment' => 108
            ],
//            Rifle Man
            [
                'job_title_id' => 108,
                'job_class_id' => null,
                'career_path_id' => 1,
                'rank_id' => 3,
                'establishment' => 535
            ],
//            Comd Sgt Maj
            [
                'job_title_id' => 12,
                'job_class_id' => null,
                'career_path_id' => 1,
                'rank_id' => 8,
                'establishment' => 1
            ],
//            Reg Sgt Maj
            [
                'job_title_id' => 13,
                'job_class_id' => null,
                'career_path_id' =>1,
                'rank_id' => 8,
                'establishment' => 5
            ],
//            Coy Sgt Maj
            [
                'job_title_id' => 14,
                'job_class_id' => null,
                'career_path_id' => 1,
                'rank_id' => 7,
                'establishment' => 18,
            ],
//            Det Sgt Maj
            [
                'job_title_id' => 15,
                'job_class_id' => null,
                'career_path_id' => 1,
                'rank_id' => 7,
                'establishment' => 3
            ],
//            Field Sqd Sgt Maj
            [
                'job_title_id' => 16,
                'job_class_id' => null,
                'career_path_id' => 39,
                'rank_id' => 7,
                'establishment' => 1
            ],
//            SFOD Sgt Maj
            [
                'job_title_id' => 17,
                'job_class_id' => null,
                'career_path_id' => 8,
                'rank_id' => 7,
                'establishment' => 1
            ],
//            Band Sgt Maj
            [
                'job_title_id' => 18,
                'job_class_id' => null,
                'career_path_id' =>24,
                'rank_id' => 7,
                'establishment' =>1,
            ],
//            G1
            [
                'job_title_id' => 19,
                'job_class_id' => null,
                'career_path_id' => 19,
                'rank_id' => 13,
                'establishment' =>1
            ],
//            G2
            [
                'job_title_id' => 111,
                'job_class_id' => null,
                'career_path_id' => 6,
                'rank_id' => 13,
                'establishment' =>1
            ],
//            G3
            [
                'job_title_id' => 189,
                'job_class_id' => null,
                'career_path_id' =>5,
                'rank_id' => 13,
                'establishment' =>1
            ],
//            G4
            [
                'job_title_id' => 124,
                'job_class_id' => null,
                'career_path_id' =>27,
                'rank_id' => 13,
                'establishment' =>1
            ],
//            G5
            [
                'job_title_id' => 220,
                'job_class_id' => null,
                'career_path_id' =>27,
                'rank_id' => 13,
                'establishment' =>1
            ],
//            G6
            [
                'job_title_id' => 85,
                'job_class_id' => null,
                'career_path_id' =>21,
                'rank_id' => 13,
                'establishment' =>1
            ],
//            G7
            [
                'job_title_id' => 221,
                'job_class_id' => null,
                'career_path_id' =>18,
                'rank_id' => 13,
                'establishment' =>1
            ],
//            S1
            [
                'job_title_id' => 20,
                'job_class_id' => null,
                'career_path_id' =>19,
                'rank_id' => 12,
                'establishment' =>1
            ],
//            S2
            [
                'job_title_id' => 112,
                'job_class_id' => null,
                'career_path_id' => 6,
                'rank_id' => 12,
                'establishment' =>1
            ],
//            S3
            [
                'job_title_id' => 190,
                'job_class_id' => null,
                'career_path_id' =>5,
                'rank_id' => 12,
                'establishment' =>1
            ],
//            S4
            [
                'job_title_id' => 125,
                'job_class_id' => null,
                'career_path_id' =>27,
                'rank_id' => 12,
                'establishment' =>1
            ],
//            S5
            [
                'job_title_id' => 221,
                'job_class_id' => null,
                'career_path_id' =>27,
                'rank_id' => 12,
                'establishment' =>1
            ],
//            S6
            [
                'job_title_id' => 86,
                'job_class_id' => null,
                'career_path_id' =>21,
                'rank_id' => 12,
                'establishment' =>1
            ],
//            S7
            [
                'job_title_id' => 212,
                'job_class_id' => null,
                'career_path_id' =>18,
                'rank_id' => 12,
                'establishment' => 1
            ],

            /**
             * Administration
             */
//            Chief Clerk
            [
                'job_title_id' => 29,
                'job_class_id' => null,
                'career_path_id' => 18,
                'rank_id' => 7,
                'establishment' => 5
            ],
//        Admin NCO
            [
                'job_title_id' => 30,
                'job_class_id' => null,
                'career_path_id' =>18,
                'rank_id' => 5,
                'establishment' => 20
            ],
//        Admin Clerk
            [
                'job_title_id' => 33,
                'job_class_id' => 2,
                'career_path_id' => 18,
                'rank_id' => 5,
                'establishment' => 16
            ],
            [
                'job_title_id' => 33,
                'job_class_id' => 3,
                'career_path_id' => 18,
                'rank_id' => 3,
                'establishment' => 16
            ],
            [
                'job_title_id' => 33,
                'job_class_id' => 4,
                'career_path_id' => 4,
                'rank_id' => 2,
                'establishment' => 60,
            ],
            /**
             * Human Resource
             */
//            HRO
            [
                'job_title_id' => 21,
                'job_class_id' => null,
                'career_path_id' => 6,
                'rank_id' => 12,
                'establishment' => 2
            ],
//            G1 Legal
            [
                'job_title_id' => 25,
                'job_class_id' => null,
                'career_path_id' => 6,
                'rank_id' => 12,
                'establishment' => 1
            ],
//            Legal WO
            [
                'job_title_id' => 26,
                'job_class_id' => null,
                'career_path_id' => 6,
                'rank_id' => 8,
                'establishment' => 1
            ],
//            HR WO
            [
                'job_title_id' => 22,
                'job_class_id' => null,
                'career_path_id' => 6,
                'rank_id' => 8,
                'establishment' => 1
            ],
//            HRO SNCO
            [
                'job_title_id' => 23,
                'job_class_id' => null,
                'career_path_id' => 6,
                'rank_id' => 6,
                'establishment' => 1
            ],
//            HRO Clerk
            [
                'job_title_id' => 24,
                'job_class_id' => null,
                'career_path_id' => 6,
                'rank_id' => 3,
                'establishment' => 3
            ],
//      Education WO
            [
                'job_title_id' => 36,
                'job_class_id' => null,
                'career_path_id' => 6,
                'rank_id' => 7,
                'establishment' => 1
            ],
//            Education SNCO
            [
                'job_title_id' => 37,
                'job_class_id' => null,
                'career_path_id' => 6,
                'rank_id' => 6,
                'establishment' => 1
            ],
//            Education Records NCO
            [
                'job_title_id' => 38,
                'job_class_id' => null,
                'career_path_id' => 6,
                'rank_id' => 4,
                'establishment' => 1
            ],
            /**
             * Information Communication Technology
             */
//            SO3 ICT
            [
                'job_title_id' => 87,
                'job_class_id' => null,
                'career_path_id' => 21,
                'rank_id' => 12,
                'establishment' => 1
            ],
//          Application Development Administrator
            [
                'job_title_id' => 88,
                'job_class_id' => null,
                'career_path_id' =>21,
                'rank_id' => 4,
                'establishment' => 2
            ],
//            Cyber Security Administrator
            [
                'job_title_id' => 90,
                'job_class_id' => null,
                'career_path_id' =>21,
                'rank_id' => 4,
                'establishment' => 2
            ],
//           Network & Cyber Security Administrator
            [
                'job_title_id' => 95,
                'job_class_id' => null,
                'career_path_id' =>21,
                'rank_id' => 4,
                'establishment' => 2
            ],
//           Network Administrator
            [
                'job_title_id' => 96,
                'job_class_id' => null,
                'career_path_id' =>21,
                'rank_id' => 3,
                'establishment' => 2
            ],
//            System Administrator
            [
                'job_title_id' => 98,
                'job_class_id' => null,
                'career_path_id' =>21,
                'rank_id' => 4,
                'establishment' => 4
            ],
//            Jr Administrator
            [
                'job_title_id' => 94,
                'job_class_id' => null,
                'career_path_id' =>21,
                'rank_id' => 3,
                'establishment' => 4
            ],

//            [
//                'job_title_id' => ,
//                'job_class_id' => null,
//                'career_path_id' =>,
//                'rank_id' => ,
//                'establishment' =>
//            ],

        ];

        Job::insert($jobs);
    }
}
