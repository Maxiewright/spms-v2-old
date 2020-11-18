<?php

namespace Database\Factories\Serviceperson;

use App\Models\Serviceperson\Dependent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DependentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dependent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pin' => $this->faker->numberBetween(10000000000, 10999999999),
            'date_of_birth' => $this->faker->dateTimeBetween('-10 years', 'now')->format('Y-m-d'),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'other_names' => $this->faker->firstName,
            'relationship_id' => $this->faker->numberBetween(1,6),
            'gender_id' => $this->faker->numberBetween(1,2),
            'religion_id' => $this->faker->numberBetween(1,13),
            'is_next_of_kin' => $this->faker->numberBetween(0,1),


        ];
    }
}
