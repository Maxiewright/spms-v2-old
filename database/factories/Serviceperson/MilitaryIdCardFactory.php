<?php

namespace Database\Factories\Serviceperson;

use App\Models\Serviceperson\MilitaryIdCard;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MilitaryIdCardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MilitaryIdCard::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->unique()->numberBetween(1900000, 1999999),
            'issued_on' => $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'expired_on' => $this->faker->dateTimeBetween('now', '+1 Year')->format('Y-m-d'),
        ];
    }
}
