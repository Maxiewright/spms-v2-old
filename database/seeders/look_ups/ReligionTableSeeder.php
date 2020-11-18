<?php
namespace Database\Seeders\look_ups;
use App\Models\System\Universal\Lookup\Religion;
use Illuminate\Database\Seeder;

class ReligionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $religions= [

                [
                'name'    =>  'Anglican',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'    =>  'Baha\'i',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'    =>  'Baptist',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'    =>  'Buddhism',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'    =>  'Hindu',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'    =>  'Jehovah\'s Witness',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'    =>  'Muslim',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'    =>  '	Non-religious',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'    =>  'Other',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'    =>  'Pentecostal',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'    =>  'Presbyterian',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'    =>  'Roman Catholic',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'    =>  'Seventh-Day Adventist',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ]];

            Religion::insert($religions);
        }
    }
}
