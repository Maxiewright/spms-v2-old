<?php

namespace Database\Factories\Serviceperson;

use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\ServicepersonDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicepersonDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServicepersonDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serviceperson_number' => Serviceperson::factory(),
            'rank_id',
            'job_appointment_id',
            'branch_id',
            'career_path_id',
            'stream_id',
            'crod',
        ];
    }
}
