<?php
namespace Database\Seeders\look_ups;


use App\Models\System\Universal\Lookup\Ethnicity;
use Illuminate\Database\Seeder;

class EthnicityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $ethnicity = [
                [
                'name'      => 'African-Trinbagonian',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'      => 'Arab-Trinbagonian',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'      => 'Chinese-Trinbagonian',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'      => 'Cocoa Panyol',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'      => 'Dougla',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'      => 'European-Trinbagonian',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'      => 'Indigenous',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'      => 'Indo-Trinbagonian',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'      => 'Mixed',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ],
            [
                'name'      => 'Mulatto-Creole',
                'created_at' => '2020-02-10 13:00:00',
                'updated_at' => '2020-02-10 13:00:00',
                'deleted_at' => null,
            ]];

            Ethnicity::insert($ethnicity);
        }
    }
}
