<?php

namespace Database\Factories\Serviceperson;

use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServicepersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Serviceperson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'formation_id' => 1,
            'number'=> $this->faker->numberBetween(1000, 14000),
            'rank_id' => $this->faker->numberBetween(1,7),
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'ethnicity_id' => $this->faker->numberBetween(1,7),
            'marital_status_id' => $this->faker->numberBetween(1,2),
            'religion_id' => $this->faker->numberBetween(1,8),
            'serviceperson_status_id' => 1,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Serviceperson $serviceperson ){
            $serviceperson->allergies()->attach(rand(1,18), ['particulars' => $this->faker->text(100)]);
            $serviceperson->measurements()->attach(rand(1, 25 ), ['measured_on' => $this->faker->dateTimeBetween('-3 years' , 'now')->format('Y-m-d')]);
            $serviceperson->awards()->attach(rand(1, 4), ['received_on' => $this->faker->dateTimeBetween('-10 years' , 'now')->format('Y-m-d'),]);
            $serviceperson->hobbies()->attach(rand(1, 25));
            $serviceperson->sports()->attach(rand(1, 12));
            $serviceperson->medicalConditions()->attach(rand(1,47 ), ['particulars' => $this->faker->text(100)]);
//            $serviceperson->JobAppointments()->attach(rand(1, 30), ['started_on' => $this->faker->dateTimeBetween('-10 years', 'now')->format('Y-m-d'), 'ended_on' => $this->faker->dateTimeBetween('-8 years', 'now')->format('Y-m-d'), ]);
//    From 1-9 is other ranks and from 10-14 is officers..  15-16 is General Ranks
            $serviceperson->promotions()->attach(rand(2, 8), ['promoted_on' => $this->faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d'), 'substantive_on' => $this->faker->dateTimeBetween('-8 years', 'now')->format('Y-m-d'), ]);
            $serviceperson->vaccines()->attach(rand(1, 21), ['received_on' => $this->faker->date(), 'place_administered' => $this->faker->company]);
            $serviceperson->weights()->attach(rand(1, 25), ['weighed_on' => $this->faker->dateTimeBetween('-3 years' , 'now')->format('Y-m-d')]);

        });
    }
}
