<?php

namespace Modules\Leave\Database\Factories;

use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Leave\Entities\Leave;
use Modules\Leave\Entities\LeaveAdjustment;

class LeaveAdjustmentFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LeaveAdjustment::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       return [
           'leave_id' => Leave::factory(),
           'leave_adjustment_reason_id' => $this->faker->numberBetween(1, 2),
           'ended_on' => $this->faker->date(),
           'adjusted_by' => Serviceperson::factory()
       ];
    }
}
