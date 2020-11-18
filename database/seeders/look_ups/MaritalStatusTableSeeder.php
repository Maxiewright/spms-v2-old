<?php
namespace Database\Seeders\look_ups;

use App\Models\System\Universal\Lookup\MaritalStatus;
use Illuminate\Database\Seeder;

class MaritalStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $maritalStatuses = [
                [
                    'name'    =>  'Single',
                    'created_at' => '2020-02-10 13:00:00',
                    'updated_at' => '2020-02-10 13:00:00',
                    'deleted_at' => null,
                ],
            [
                'name'    =>  'Married',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'    =>  'Divorced',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'    =>  'Widowed',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'    =>  'Common-law',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ]];

        MaritalStatus::insert($maritalStatuses);
    }
    }
}
