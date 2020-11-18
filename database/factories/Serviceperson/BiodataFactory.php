<?php

namespace Database\Factories\Serviceperson;

use App\Models\Serviceperson\Biodata;
use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BiodataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Biodata::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serviceperson_number' => Serviceperson::factory(),
            'eye_colour_id' => $this->faker->numberBetween(1,6),
            'hair_colour_id'=>  $this->faker->numberBetween(1,7 ),
            'skin_colour_id' => $this->faker->numberBetween(1,6 ),
            'blood_type_id' => $this->faker->numberBetween(1, 8),
            'wears_glasses' => $this->faker->numberBetween(0, 1),
            'wears_contacts' => $this->faker->numberBetween(0,1)
        ];
    }
}
