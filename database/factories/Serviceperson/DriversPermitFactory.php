<?php

namespace Database\Factories\Serviceperson;

use App\Models\Serviceperson\DriversPermit;
use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DriversPermitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DriversPermit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->unique()->numberBetween(3700000, 3799999),
            'serviceperson_number' => Serviceperson::factory(),
            'drivers_permit_type_id' => $this->faker->numberBetween(1, 3),
            'drivers_permit_class_id' => $this->faker->numberBetween(3, 5),
            'drivers_permit_transaction_code_id' => $this->faker->numberBetween(1, 3),
            'issued_on' => $this->faker->dateTimeBetween('-4 years', 'now')->format('Y-m-d'),
            'expired_on' => $this->faker->dateTimeBetween('now', '+2 Years')->format('Y-m-d'),
        ];
    }
}
