<?php

namespace Modules\Leave\Database\Factories;


use App\Models\Serviceperson\Serviceperson;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Leave\Entities\LeaveEntitlement;

class LeaveEntitlementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LeaveEntitlement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serviceperson_number' => Serviceperson::factory(),
            'leave_group_entitlement_id' => $this->faker->numberBetween(1,2),
            'year' => $this->faker->year('now'),
            'days_due' => $this->faker->numberBetween(30, 300),
        ];
    }
}
