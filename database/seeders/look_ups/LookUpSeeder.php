<?php


namespace Database\Seeders\look_ups;


use App\Models\System\Serviceperson\Address\DivisionOrRegionType;
use Database\Seeders\look_ups\address\CityOrTownSeeder;
use Database\Seeders\look_ups\address\DivisionOrRegionSeeder;
use Database\Seeders\look_ups\address\DivisionOrRegionTypeSeeder;
use Illuminate\Database\Seeder;

class LookUpSeeder extends Seeder
{
    public function run()
    {
        $this->call([
//            Address Look up
            DivisionOrRegionTypeSeeder::class,
            DivisionOrRegionSeeder::class,
            CityOrTownSeeder::class,

//        Look up
            ApprovalStatusSeeder::class,
            DriversPermitLookupSeeder::class,
            EmailTypeSeeder::class,
            EthnicityTableSeeder::class,
            ExtracurricularSeeder::class,
            GenderSeeder::class,
            MaritalStatusTableSeeder::class,
            PhoneTypeSeeder::class,
            RecommendationStatusSeeder::class,
            RelationshipSeeder::class,
            ReligionTableSeeder::class,
        ]);
    }
}
