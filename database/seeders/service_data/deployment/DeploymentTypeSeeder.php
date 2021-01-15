<?php

namespace Database\Seeders\service_data\deployment;

use App\Models\System\Serviceperson\ServiceData\DeploymentType;
use Illuminate\Database\Seeder;

class DeploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
               'name' => 'Relief Operations',
               'slug' => 'Relief Ops',
               'description' => '',
            ],
            [
                'name' => 'Support to Civil Law Enforcement',
                'slug' => 'Spt to civil law',
                'description' => '',
            ],
            [
                'name' => 'Humanitarian Assistance',
                'slug' => 'Humanitarian Assist',
                'description' => '',
            ],
            [
                'name' => 'Show of Force',
                'slug' => 'Show of Force',
                'description' => '',
            ],
            [
                'name' => 'Evacuation Operations',
                'slug' => 'Evacuation Ops',
                'description' => '',
            ],

        ];

        DeploymentType::insert($types);
    }
}
