<?php
namespace Database\Seeders\service_data\unit;

use App\Models\System\Serviceperson\Unit\Section;
use Illuminate\Database\Seeder;

class UnitDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            FormationSeeder::class,
            BattalionSeeder::class,
            CompanySeeder::class,
            PlatoonSeeder::class,
            SectionSeeder::class,
        ]);

    }

}
