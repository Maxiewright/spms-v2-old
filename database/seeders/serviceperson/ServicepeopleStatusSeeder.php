<?php
namespace Database\Seeders\serviceperson;
use App\Models\System\Serviceperson\LookUp\ServicepersonStatus;
use Illuminate\Database\Seeder;

class ServicepeopleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $servicepersonStatuses = [
                [
                    'name' => 'Available for duty',
                    'slug' => 'Available',
                    'created_at' => '2020-03-01 07:20:00',
                ],
                [
                    'name' => 'Privilege leave',
                    'slug' => 'P/L',
                    'created_at' => '2020-03-01 07:20:00',
                ],
                [
                    'name' => 'Sick leave',
                    'slug' => 'S/L',
                    'created_at' => '2020-03-01 07:20:00',
                ],
                [
                    'name' => 'Internal Training',
                    'slug' => 'Local Trg',
                    'created_at' => '2020-03-01 07:20:00',
                ],
                [
                    'name' => 'In-service Training',
                    'slug' => 'In-service',
                    'created_at' => '2020-03-01 07:20:00',
                ],
                [
                    'name' => 'Foreign Military Training',
                    'slug' => 'Overseas Trg',
                    'created_at' => '2020-03-01 07:20:00',
                ],
                [
                    'name' => 'Resettlement Training',
                    'slug' => 'R/Trg',
                    'created_at' => '2020-03-01 07:20:00',
                ],
                [
                    'name' => 'Absent Without Leave',
                    'slug' => 'AWOL',
                    'created_at' => '2020-07-30 08:00:00',
                ],

            ];
            ServicepersonStatus::insert($servicepersonStatuses);
        }
    }
}
