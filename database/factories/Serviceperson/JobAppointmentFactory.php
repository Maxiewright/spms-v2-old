<?php

namespace Database\Factories\Serviceperson;

use App\Models\Serviceperson\JobAppointment;
use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobAppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobAppointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startDate = $this->faker->dateTimeBetween('-5 years', now());

        return [
            'serviceperson_number' => Serviceperson::factory(),
            'job_id' => $this->faker->numberBetween(1, 50),
            'started_on' => $startDate,
            'ended_on' => $this->faker->dateTimeBetween($startDate, '+5 years')
        ];
    }
}
