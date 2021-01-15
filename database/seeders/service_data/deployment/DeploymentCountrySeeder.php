<?php

namespace Database\Seeders\service_data\deployment;

use App\Models\System\Serviceperson\ServiceData\DeploymentCountry;
use Illuminate\Database\Seeder;

class DeploymentCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'name' => 'Bahamas',
                'code' => '',
            ],
            [
                'name' => 'Cuba',
                'code' => '',
            ],
            [
                'name' => 'Dominican Republic',
                'code' => '',
            ],
            [
                'name' => 'Grenada',
                'code' => '',
            ],
            [
                'name' => 'Haiti',
                'code' => '',
            ],
            [
                'name' => 'Hunduras',
                'code' => '',
            ],
            [
                'name' => 'Jamaica',
                'code' => '',
            ],
            [
                'name' => 'Antigua and Barbuda',
                'code' => '',
            ],
            [
                'name' => 'Saint Kitts and Nevis',
                'code' => '',
            ],
            [
                'name' => 'Saint Lucia',
                'code' => '',
            ],
            [
                'name' => 'Saint Vincent and the Grenadines',
                'code' => '',
            ],
            [
                'name' => 'Dominica',
                'code' => '',
            ],
            [
                'name' => 'Belize',
                'code' => '',
            ],
            [
                'name' => 'Anguilla',
                'code' => '',
            ],
            [
                'name' => 'Montserrat',
                'code' => '',
            ],
        ];

        DeploymentCountry::insert($countries);
    }
}
