<?php

namespace Database\Factories\Serviceperson;

use App\Models\Serviceperson\PhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PhoneNumberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PhoneNumber::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->unique()->numberBetween(1700000,1799999),
        ];
    }
}
