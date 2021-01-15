<?php

namespace Modules\Records\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Records\Entities\Index\FileCategory;
use Modules\Records\Entities\Index\FileSubCategory;

class RecordsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call([

             //Document Index
             FileCategoryTableSeeder::class,

             //Document Index Subcategories
             FileSubcategoryTableSeeder::class,

             //Document Index Sub Subcategories
             AccommodationSubSubcategoryTableSeeder::class,
             AdministrationSubSubcategoryTableSeeder::class,
             BoardsSubSubcategoryTableSeeder::class,
             ConfrencesCommitteMeetingSubSubcategoryTableSeeder::class,
             EstablishementSubSubcategoryTableSeeder::class,
             FinancialAndAccountingMattersSubSubcategoryTableSeeder::class,
             FuneralWargravesSubSubcategoryTableSeeder::class,
             GovermentOfficialsSubSubcategoryTableSeeder::class,
             MentalAndDentalSubSubcategoryTableSeeder::class,
             OperationsSubSubcategoryTableSeeder::class,
             ParadesSubSubcategoryTableSeeder::class,
             PersonnelSubSubcategoryTableSeeder::class,
             SecuritySubSubcategoryTableSeeder::class,
             SportsSubSubcategoryTableSeeder::class,
             TrainingSubSubcategoryTableSeeder::class,
             VolunteerDefenceForceSubSubcategoryTableSeeder::class,
         ]);
    }
}
