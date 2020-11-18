<?php
namespace Database\Seeders\look_ups;

use App\Models\System\Universal\Lookup\PhoneType;
use Illuminate\Database\Seeder;

class PhoneTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $phoneTypes= [

                [
                'name'    =>  'Mobile',
                'created_at' => '2020-02-12 14:20:00',
                'updated_at' => '2020-02-12 14:20:00',
            ],
            [
                'name'    =>  'Home',
                'created_at' => '2020-02-12 14:20:00',
                'updated_at' => '2020-02-12 14:20:00',
            ],
            [
                'name'    =>  'Work',
                'created_at' => '2020-02-12 14:20:00',
                'updated_at' => '2020-02-12 14:20:00',
            ],
//                May be introduced at a later time
                /*
            [
                'name'    =>  'Home Fax',
                'created_at' => '2020-02-12 14:20:00',
                'updated_at' => '2020-02-12 14:20:00',
            ],
            [
                'name'    =>  'Work Fax',
                'created_at' => '2020-02-12 14:20:00',
                'updated_at' => '2020-02-12 14:20:00',
            ],
            [
                'name'    =>  'Main',
                'created_at' => '2020-02-12 14:20:00',
                'updated_at' => '2020-02-12 14:20:00',
            ],
            [
                'name'    =>  'Other',
                'created_at' => '2020-02-12 14:20:00',
                'updated_at' => '2020-02-12 14:20:00',
            ]
                */
            ];

            PhoneType::insert($phoneTypes);
        }
    }
}
