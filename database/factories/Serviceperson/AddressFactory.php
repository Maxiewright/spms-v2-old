<?php

namespace Database\Factories\Serviceperson;

use App\Models\Serviceperson\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address1' => $this->faker->streetName,
            'address2' => $this->faker->secondaryAddress,
            'city_or_town_id' => $this->faker->numberBetween(1,508),
        ];
    }
}
