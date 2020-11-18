<?php

namespace Database\Factories\Serviceperson;

use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\ServicepersonEducation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServicepersonEducationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServicepersonEducation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serviceperson_number' => Serviceperson::factory(),
            'education_level_id' => $this->faker->numberBetween(1, 5),
            'subject_id' => $this->faker->numberBetween(1, 53),
            'education_grade_id' => $this->faker->numberBetween(1, 6 ),
            'school_id' => $this->faker->numberBetween(1, 6),
            'completed_on' => $this->faker->dateTimeBetween('-20 years', 'now')->format('Y-m-d'),
        ];
    }
}
