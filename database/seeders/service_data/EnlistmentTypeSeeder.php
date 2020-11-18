<?php


namespace Database\Seeders\service_data;


use App\Models\System\Serviceperson\ServiceData\EnlistmentType;
use Illuminate\Database\Seeder;

class EnlistmentTypeSeeder extends Seeder
{
    public function run()
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
}
