<?php
namespace Database\Seeders\look_ups;
use App\Models\System\Universal\Status\RecommendationStatus;
use Illuminate\Database\Seeder;

class RecommendationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'Pending'
            ],
            [
                'name' => 'Recommended'
            ],
            [
                'name' => 'Not Recommended'
            ],
        ];

        RecommendationStatus::insert($statuses);
    }
}
