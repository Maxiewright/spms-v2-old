<?php
namespace Database\Seeders\look_ups;

use App\Models\System\Serviceperson\DriversPermit\DriversPermitClass;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitTransactionCode;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitType;
use Illuminate\Database\Seeder;

class DriversPermitLookupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $DriversPermitClasses = [
                [
                'name'    =>  'Motor Cycle',
                'slug'    =>  '1',
                'created_at' => '2020-02-14 09:20:00',
                'updated_at' => '2020-02-14 09:20:00',
                ],
                [
                    'name'    =>  'Wheel Tractors',
                    'slug'    =>  '2',
                    'created_at' => '2020-02-14 09:20:00',
                    'updated_at' => '2020-02-14 09:20:00',
                ],
                [
                    'name'    =>  'Light Motor Vehicles',
                    'slug'    =>  '3',
                    'created_at' => '2020-02-14 09:20:00',
                    'updated_at' => '2020-02-14 09:20:00',
                ],
                [
                    'name'    =>  'Heavy Motor Vehicles',
                    'slug'    =>  '4',
                    'created_at' => '2020-02-14 09:20:00',
                    'updated_at' => '2020-02-14 09:20:00',
                ],
                [
                    'name'    =>  'Extra Heavy Motor Vehicle',
                    'slug'    =>  '5',
                    'created_at' => '2020-02-14 09:20:00',
                    'updated_at' => '2020-02-14 09:20:00',
                ],
                [
                    'name'    =>  'Omnibuses',
                    'slug'    =>  '6',
                    'created_at' => '2020-02-14 09:20:00',
                    'updated_at' => '2020-02-14 09:20:00',
                ],
                [
                    'name'    =>  'Other',
                    'slug'    =>  '7',
                    'created_at' => '2020-02-14 09:20:00',
                    'updated_at' => '2020-02-14 09:20:00',
                ]];

            DriversPermitClass::insert($DriversPermitClasses);
        }

        {
            $DriversPermitTypes= [
                [
                    'name'    =>  'National',
                    'created_at' => '2020-02-14 09:20:00',
                    'updated_at' => '2020-02-14 09:20:00',
                ],
                [
                    'name'    =>  'Military',
                    'created_at' => '2020-02-14 09:20:00',
                    'updated_at' => '2020-02-14 09:20:00',
                ],
                [
                'name'    =>  'International',
                'created_at' => '2020-02-14 09:20:00',
                'updated_at' => '2020-02-14 09:20:00',
                ],

            ];

            DriversPermitType::insert($DriversPermitTypes);
        }

        {
            $DriversPermitCodes = [
                [
                'name' =>  'First Issue',
                'slug'    =>  'A',
                'created_at' => '2020-02-14 09:20:00',
                'updated_at' => '2020-02-14 09:20:00',
                ],
                [
                    'name' =>  'Renewal',
                    'slug'    =>  'B',
                    'created_at' => '2020-02-14 09:20:00',
                    'updated_at' => '2020-02-14 09:20:00',
                ],
                [
                    'name' =>  'Duplicate',
                    'slug'    =>  'C',
                    'created_at' => '2020-02-14 09:20:00',
                    'updated_at' => '2020-02-14 09:20:00',
                ],
                [
                    'name' => 'Endorsement',
                    'slug'   =>  'D',
                    'created_at' => '2020-02-14 09:20:00',
                    'updated_at' => '2020-02-14 09:20:00',
                ]];

            DriversPermitTransactionCode::insert($DriversPermitCodes);
        }
    }
}
