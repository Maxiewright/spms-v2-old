<?php
namespace Database\Seeders\look_ups;

use App\Models\System\Universal\Lookup\EmailType;
use Illuminate\Database\Seeder;

class EmailTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $emailTypes= [
                [
                    'name'    =>  'Work',
                    'created_at' => '2020-02-12 14:20:00',
                    'updated_at' => '2020-02-12 14:20:00',
                ],
                [
                'name'    =>  'Home',
                'created_at' => '2020-02-12 14:20:00',
                'updated_at' => '2020-02-12 14:20:00',
                ],
//                May be introduced at a later time
                /*
            [
                'email_type'    =>  'Other',
                'created_at' => '2020-02-12 14:20:00',
                'updated_at' => '2020-02-12 14:20:00',
            ]

                */
            ];

            EmailType::insert($emailTypes);
        }
    }
}
