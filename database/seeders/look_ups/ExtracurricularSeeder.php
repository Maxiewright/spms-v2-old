<?php
namespace Database\Seeders\look_ups;
use App\Models\System\Serviceperson\Extracurricular\Hobby;
use App\Models\System\Serviceperson\Extracurricular\HobbyType;
use App\Models\System\Serviceperson\Extracurricular\Sport;
use App\Models\System\Serviceperson\Extracurricular\SportType;
use Illuminate\Database\Seeder;

class ExtracurricularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ************************************************* name Types ***********************************************
        {
            $hobby_types = [
                [
                    'name' => 'Indoor',
                    'created_at' => '2020-02-18 04:15:00',
                ],
                [
                    'name' => 'Outdoor',
                    'created_at' => '2020-02-18 04:15:00',
                ],
                [
                    'name' => 'Collection',
                    'created_at' => '2020-02-18 04:15:00',
                ],
                [
                    'name' => 'Competition',
                    'created_at' => '2020-02-18 04:15:00',
                ],
                [
                    'name' => 'Observation',
                    'created_at' => '2020-02-18 04:15:00',
                ],
            ];
            HobbyType::insert($hobby_types);
        }




        // ************************************************* name Types ***********************************************

        {
            $sport_types = [
                [
                    'name' => 'Adventure',
                    'created_at' => '2020-02-18 04:15:00',
                ],
                [
                    'name' => 'Aquatic',
                    'created_at' => '2020-02-18 04:15:00',
                ],
                [
                    'name' => 'Strength and Agility ',
                    'created_at' => '2020-02-18 04:15:00',
                ],
                [
                    'name' => 'Ball',
                    'created_at' => '2020-02-18 04:15:00',
                ],
                [
                    'name' => 'Extreme',
                    'created_at' => '2020-02-18 04:15:00',
                ],
                [
                    'name' => 'Mountain',
                    'created_at' => '2020-02-18 04:15:00',
                ],
                [
                    'name' => 'Motorised',
                    'created_at' => '2020-02-18 04:15:00',
                ],
                [
                    'name' => 'Mind',
                    'created_at' => '2020-02-18 04:15:00',
                ],
            ];
            SportType::insert($sport_types);
        }

        // ************************************************* Hobbies ***********************************************
        {
            $hobbies = [
                [
                    'hobby_type_id' => 1,
                    'name' => 'Board Games',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 1,
                    'name' => 'Acting',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 1,
                    'name' => 'Computer Programming',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 1,
                    'name' => 'Creative writing',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 1,
                    'name' => 'Watching television',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 2,
                    'name' => 'Archery',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 2,
                    'name' => 'Bird Watching',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 2,
                    'name' => 'Flying',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 2,
                    'name' => 'Motor name',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 2,
                    'name' => 'Photography ',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 3,
                    'name' => 'Seashell collecting',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 3,
                    'name' => 'Insect collecting',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 3,
                    'name' => 'Action figure',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 3,
                    'name' => 'Card collecting',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 3,
                    'name' => 'Vintage cars',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 4,
                    'name' => 'Cycling',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 4,
                    'name' => 'Cricket',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 4,
                    'name' => 'Football',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 4,
                    'name' => 'Weightlifting',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 4,
                    'name' => 'Martial Arts',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 5,
                    'name' => 'Birdwatching',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 5,
                    'name' => 'Fish keeping',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 5,
                    'name' => 'Reading',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 5,
                    'name' => 'Astrology',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'hobby_type_id' => 5,
                    'name' => 'People watching',
                    'created_at' => '2020-02-18 04:20:00',
                ],
            ];
            Hobby::insert($hobbies);
        }

        // ************************************************* Sports ***********************************************

        {
            $sports = [
                [
                    'sport_type_id' => 1,
                    'name' => 'Kayaking',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'sport_type_id' => 1,
                    'name' => 'Canoeing',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'sport_type_id' => 1,
                    'name' => 'Rafting',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'sport_type_id' => 1,
                    'name' => 'Surfing',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'sport_type_id' => 2,
                    'name' => 'Snorkeling',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'sport_type_id' => 2,
                    'name' => 'Diving',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'sport_type_id' => 2,
                    'name' => 'Scuba diving',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'sport_type_id' => 2,
                    'name' => 'Swimming',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'sport_type_id' => 3,
                    'name' => 'Aerobics',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'sport_type_id' => 3,
                    'name' => 'Martial Arts',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'sport_type_id' => 3,
                    'name' => 'Bodybuilding',
                    'created_at' => '2020-02-18 04:20:00',
                ],
                [
                    'sport_type_id' => 3,
                    'name' => 'Cross-country running',
                    'created_at' => '2020-02-18 04:20:00',
                ],
            ];
            Sport::insert($sports);
        }
    }
}
