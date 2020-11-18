<?php
namespace Database\Seeders\qualification\education\school;

use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SchoolDistrictsSeeder::class,
            SchoolLevelsSeeder::class,
            SchoolTypesSeeder::class,
            SecondarySchoolsSeeder::class,
            PostSecondarySchoolsSeeder::class,
            CollegesSeeder::class,
            UniversitiesSeeder::class,
        ]);
    }
}
