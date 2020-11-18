<?php

namespace Database\Factories\Serviceperson;

use App\Models\Serviceperson\Enlistment;
use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EnlistmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Enlistment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serviceperson_number' => Serviceperson::factory(),
            'enlistment_type_id' => $this->faker->numberBetween(1,3),
            'date' => $this->faker->dateTimeBetween('1991-01-01', '1995-01-01')->format('Y-m-d'),
            'engagement_period_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
