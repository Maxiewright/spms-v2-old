<?php
namespace Database\Seeders\service_data;

use App\Models\System\Serviceperson\ServiceData\Decoration;
use App\Models\System\Serviceperson\ServiceData\EnlistmentType;
use Illuminate\Database\Seeder;

class ServiceDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Enlistment Types
        {
            $enlistmentTypes = [
                [
                    'name'=>'Enlisted',
                    'slug'=>'E',
                    'created_at'=>'2020-02-14 10:00:00',
                ],
                [
                    'name'=>'Regular Officer',
                    'slug'=>'O',
                    'enlistment_created_at'=>'2020-02-14 10:00:00',
                ],
                [
                    'name'=>'Special Service Officer',
                    'slug'=>'SSO',
                    'created_at'=>'2020-02-14 10:00:00',
                ]
            ];

            EnlistmentType::insert($enlistmentTypes);
        }


        // Decorations
        {
            $decorations = [
                [
                    'name'=>'50th Anniversary',
                    'slug'=>'50th',
                    'created_at'=>'2020-02-14 10:20:00',
                ],
                [
                    'name'=>'Efficiency Medal',
                    'slug'=>'Efficiency',
                    'created_at'=>'2020-02-14 10:20:00',
                ],
                [
                    'name'=>'Fifth Summit of the Americas',
                    'slug'=>'5th Summit',
                    'created_at'=>'2020-02-14 10:20:00',
                ],
                [
                    'name'=>'Humanitarian Service',
                    'slug'=> 'Humanitarian',
                    'created_at'=>'2020-02-14 10:20:00',
                ]
            ];
            Decoration::insert($decorations);
        }

    }
}
