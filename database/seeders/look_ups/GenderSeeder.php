<?php
namespace Database\Seeders\look_ups;
use App\Models\System\Universal\Lookup\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $gender= [
                [
                    'name'    =>  'Male',
                    'created_at' => '2020-02-13 10:17:00',
                    'updated_at' => '2020-02-13 10:17:00',
                ],
                [
                    'name'    =>  'Female',
                    'created_at' => '2020-02-13 10:17:00',
                    'updated_at' => '2020-02-13 10:17:00',
                ],

         /*   [
                'name'    =>  'Agender',
                'created_at' => '2020-02-13 10:17:00',
                'updated_at' => '2020-02-13 10:17:00',
            ],
            [
                'name'    =>  'Bigender',
                'created_at' => '2020-02-13 10:17:00',
                'updated_at' => '2020-02-13 10:17:00',
            ],
            [
                'name'    =>  'Don\'t Identify',
                'created_at' => '2020-02-13 10:17:00',
                'updated_at' => '2020-02-13 10:17:00',
            ] */
            ];

            Gender::insert($gender);
        }
    }
}
