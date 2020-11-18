<?php

namespace Database\Factories\Serviceperson;

use App\Models\Serviceperson\Passport;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PassportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Passport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->unique()->numberBetween(1700000, 1799999),
            'issued_on' => $this->faker->dateTimeBetween('-7 years', 'now')->format('Y-m-d'),
            'expired_on' => $this->faker->dateTimeBetween('now', '+5 years')->format('Y-m-d'),
        ];
    }
}
