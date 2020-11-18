<?php

namespace Database\Factories\Serviceperson;

use App\Models\Serviceperson\EmailAddress;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmailAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmailAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->email,
        ];
    }
}
