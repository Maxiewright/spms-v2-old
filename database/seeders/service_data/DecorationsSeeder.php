<?php


namespace Database\Seeders\service_data;


use App\Models\System\Serviceperson\ServiceData\Decoration;
use Illuminate\Database\Seeder;

class DecorationsSeeder extends Seeder
{
    public function run()
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
