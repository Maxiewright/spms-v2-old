<?php

namespace Modules\Leave\Database\Factories;

use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Leave\Entities\Leave;


class LeaveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Leave::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serviceperson_number' => Serviceperson::factory(),
            'leave_type_id' => $this->faker->numberBetween(1,8),
            'start_on' => $this->faker->date('y-m-d', 'now'),
            'end_on' => $this->faker->date(),
            'leave_status_id' => $this->faker->numberBetween(1,6),
            'created_by' => Serviceperson::factory(),
        ];
    }
}

