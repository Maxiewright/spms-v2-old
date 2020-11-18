<?php
namespace Database\Seeders\look_ups;

use App\Models\System\Universal\Status\ApprovalStatus;
use Illuminate\Database\Seeder;

class ApprovalStatusSeeder extends Seeder
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
                'name' => 'Approved'
            ],
            [
                'name' => 'Not Approved'
            ],
        ];
        ApprovalStatus::insert($statuses);
    }
}
