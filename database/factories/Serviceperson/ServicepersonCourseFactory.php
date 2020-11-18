<?php

namespace Database\Factories\Serviceperson;

use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\ServicepersonCourse;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServicepersonCourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServicepersonCourse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serviceperson_number' => Serviceperson::factory(),
            'course_type_id' => $this->faker->numberBetween(1,4),
            'course_institution_id' => $this->faker->numberBetween(1,6),
            'course_id' => $this->faker->numberBetween(1,7),
            'course_qualification_id' => $this->faker->numberBetween(1,4),
            'place_on_course' => $this->faker->numberBetween(1,50),
            'started_on' => $this->faker->dateTimeBetween('-10 years', '-1 day')->format('Y-m-d'),
            'ended_on' => $this->faker->dateTimeBetween('-10 years', 'now')->format('Y-m-d'),


        ];
    }
}
