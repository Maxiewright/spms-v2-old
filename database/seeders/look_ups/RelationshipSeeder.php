<?php
namespace Database\Seeders\look_ups;
use App\Models\System\Universal\Lookup\Relationship;
use Illuminate\Database\Seeder;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $dependentRelationships = [
                [
                    'name' => 'Son',
                    'created_at' => '2020-02-17 08:00:00'
                ],
                [
                    'name' => 'Daughter',
                    'created_at' => '2020-02-17 08:00:00'
                ],
                [
                    'name' => 'Spouse',
                    'created_at' => '2020-02-17 08:00:00'
                ],
                [
                    'name' => 'Nephew',
                    'created_at' => '2020-02-17 08:00:00'
                ],
                [
                    'name' => 'Niece',
                    'created_at' => '2020-02-17 08:00:00'
                ],
                [
                    'name' => 'Friend',
                    'created_at' => '2020-02-17 08:00:00'
                ],

            ];
            Relationship::insert($dependentRelationships);
        }

    }
}
