<?php

namespace Database\Seeders;

use Database\Seeders\event\EventSeeder;
use Database\Seeders\look_ups\address\CityOrTownSeeder;
use Database\Seeders\look_ups\address\DivisionOrRegionSeeder;
use Database\Seeders\look_ups\address\DivisionOrRegionTypeSeeder;
use Database\Seeders\look_ups\ApprovalStatusSeeder;
use Database\Seeders\look_ups\DriversPermitLookupSeeder;
use Database\Seeders\look_ups\EmailTypeSeeder;
use Database\Seeders\look_ups\EthnicityTableSeeder;
use Database\Seeders\look_ups\ExtracurricularSeeder;
use Database\Seeders\look_ups\GenderSeeder;
use Database\Seeders\look_ups\MaritalStatusTableSeeder;
use Database\Seeders\look_ups\PhoneTypeSeeder;
use Database\Seeders\look_ups\RecommendationStatusSeeder;
use Database\Seeders\look_ups\RelationshipSeeder;
use Database\Seeders\look_ups\ReligionTableSeeder;
use Database\Seeders\medical\BiodataSeeder;
use Database\Seeders\medical\MedicalClassificationGradeSeeder;
use Database\Seeders\medical\MedicalHistorySeeder;
use Database\Seeders\qualification\course\CourseSeeder;
use Database\Seeders\qualification\education\EducationGradesSeeder;
use Database\Seeders\qualification\education\EducationLevelsSeeder;
use Database\Seeders\qualification\education\school\SchoolSeeder;
use Database\Seeders\qualification\education\subject\SubjectsSeeder;
use Database\Seeders\service_data\EngagementPeriodSeeder;
use Database\Seeders\service_data\RankSeeder;
use Database\Seeders\service_data\ReEngagementPeriodsSeeder;
use Database\Seeders\service_data\ServiceDataSeeder;
use Database\Seeders\service_data\serviceperson_job\BranchSeeder;
use Database\Seeders\service_data\serviceperson_job\CareerPathSeeder;
use Database\Seeders\service_data\serviceperson_job\establishment\BranchEstablishmentSeeder;
use Database\Seeders\service_data\serviceperson_job\establishment\CareerPathEstablishmentSeeder;
use Database\Seeders\service_data\serviceperson_job\establishment\StreamEstablishmentSeeder;
use Database\Seeders\service_data\serviceperson_job\JobClassSeeder;
use Database\Seeders\service_data\serviceperson_job\JobSeeder;
use Database\Seeders\service_data\serviceperson_job\JobTitleSeeder;
use Database\Seeders\service_data\serviceperson_job\SpecialitySeeder;
use Database\Seeders\service_data\serviceperson_job\StreamSeeder;
use Database\Seeders\service_data\unit\UnitDataSeeder;
use Database\Seeders\serviceperson\ServicepeopleStatusSeeder;
use Database\Seeders\system\admin\SuperAdminSeeder;
use Database\Seeders\system\RolesAndPermissionSeeder;
use Database\Seeders\system\testServicepeople\TestServicepeopleSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            $this->call([
                /*************************************************** Record Card *****************************************************/
                /** Basic Info */
                EthnicityTableSeeder::class,
                GenderSeeder::class,
                ReligionTableSeeder::class,
                MaritalStatusTableSeeder::class,

                /** Contact */
                DivisionOrRegionTypeSeeder::class,
                DivisionOrRegionSeeder::class,
                CityOrTownSeeder::class,

                EmailTypeSeeder::class,
                PhoneTypeSeeder::class,

                /** Identification */
                DriversPermitLookupSeeder::class,

                /** Service data */

                ServicepeopleStatusSeeder::class,
                ServiceDataSeeder::class,
                RankSeeder::class,
                UnitDataSeeder::class,
                EngagementPeriodSeeder::class,
                ReEngagementPeriodsSeeder::class,

                /** Serviceperson Job */
                BranchSeeder::class,
                StreamSeeder::class,
                CareerPathSeeder::class,
                SpecialitySeeder::class,
                JobTitleSeeder::class,
                JobClassSeeder::class,
                JobSeeder::class,

                //Establishment
                BranchEstablishmentSeeder::class,
                StreamEstablishmentSeeder::class,
                CareerPathEstablishmentSeeder::class,

                /** Qualification */
//            Education
                EducationLevelsSeeder::class,
                EducationGradesSeeder::class,
                SubjectsSeeder::class,
                SchoolSeeder::class,
//             Courses
                CourseSeeder::class,

                /** Medical */

                BiodataSeeder::class,
                MedicalHistorySeeder::class,

                /**  Dependant & Extracurricular */

                RelationshipSeeder::class,
                ExtracurricularSeeder::class,

                /** General lookups */
                ApprovalStatusSeeder::class,
                RecommendationStatusSeeder::class,
                MedicalClassificationGradeSeeder::class,
//*************************************************** Retirement ************************************************

//            SOSReasonsSeeder::class,

                /**
                 ******************************************************* Administration  ***************************************************
                 */
                /** Leave */
//             LeaveGroupSeeder::class,
//             LeaveStatusSeeder::class,

                /**
                 ******************************************************* System Security  ***************************************************
                 */

                RolesAndPermissionSeeder::class,
                SuperAdminSeeder::class,
                TestServicepeopleSeeder::class,

            ]);
        });
    }
}
