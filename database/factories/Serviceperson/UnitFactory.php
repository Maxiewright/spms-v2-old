<?php

namespace Database\Factories\Serviceperson;

use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serviceperson_number' => Serviceperson::factory(),
            'company_id' => $this->faker-> numberBetween(1, 19),
            'platoon_id' => $this->faker-> numberBetween(1, 24),
            'section_id' => $this->faker-> numberBetween(1, 4),
            'joined_on' => $this->faker->dateTimeBetween('-15 years', 'now')->format('Y-m-d'),


//        'left_on' => $this->faker->dateTimeBetween('-13 years', 'now')->format('Y-m-d'),
        ];
    }
}
