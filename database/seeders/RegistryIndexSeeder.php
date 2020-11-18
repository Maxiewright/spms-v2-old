<?php
namespace Database\Seeders;

use Database\Seeders\file\AccommodationSubSubcategorySeeder;
use Database\Seeders\file\AdministrationSubSubcategorySeeder;
use Database\Seeders\file\BoardsSubSubcategorySeeder;
use Database\Seeders\file\ConferencesCommitteeMeetingSubSubcategorySeeder;
use Database\Seeders\file\EstablishmentSubSubcategorySeeder;
use Database\Seeders\file\FileCategorySeeder;
use Database\Seeders\file\FileSubcategorySeeder;
use Database\Seeders\file\FinancialAndAccountingMattersSubSubcategorySeeder;
use Database\Seeders\file\FuneralWargravesSubSubcategorySeeder;
use Database\Seeders\file\GovernmentOfficialsSubSubCategorySeeder;
use Database\Seeders\file\MentalAndDentalSubSubCategorySeeder;
use Database\Seeders\file\OperationsSubSubCategorySeeder;
use Database\Seeders\file\ParadesSubSubcategorySeeder;
use Database\Seeders\file\PersonnelSubSubCategorySeeder;
use Database\Seeders\file\SecuritySubSubcategorySeeder;
use Database\Seeders\file\SportsSubSubcategorySeeder;
use Database\Seeders\file\TrainingSubSubcategorySeeder;
use Database\Seeders\file\VolunteerDefenceForceSubSubcategorySeeder;
use Illuminate\Database\Seeder;

class RegistryIndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
//            File Seeders
            FileCategorySeeder::class,
////            Sub Group
            FileSubcategorySeeder::class,
//            Sub Sub Groups
            AccommodationSubSubcategorySeeder::class,
            AdministrationSubSubcategorySeeder::class,
            BoardsSubSubcategorySeeder::class,
            ConferencesCommitteeMeetingSubSubcategorySeeder::class,
            EstablishmentSubSubcategorySeeder::class,
            FinancialAndAccountingMattersSubSubcategorySeeder::class,
            FuneralWargravesSubSubcategorySeeder::class,
            GovernmentOfficialsSubSubcategorySeeder::class,
            MentalAndDentalSubSubcategorySeeder::class,
            OperationsSubSubcategorySeeder::class,
            ParadesSubSubcategorySeeder::class,
            PersonnelSubSubcategorySeeder::class,
            SecuritySubSubcategorySeeder::class,
            SportsSubSubcategorySeeder::class,
            TrainingSubSubcategorySeeder::class,
            VolunteerDefenceForceSubSubcategorySeeder::class,
        ]);
    }
}
