<?php

namespace Database\Factories\Serviceperson;

use App\Models\Serviceperson\NationalIdCard;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NationalIdCardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NationalIdCard::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->numberBetween(17000000000, 1799999999),
            'date_of_birth' => $this->faker->dateTimeBetween('-55 years', '-20 years')->format('Y-m-d'),
            'place_of_birth' => $this->faker->numberBetween(1,508),
            'gender_id' => $this->faker->numberBetween(1,2),
            'issued_on' => $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
            'expired_on' =>$this->faker->dateTimeBetween('now', '+3 years')->format('Y-m-d'),
        ];
    }
}
