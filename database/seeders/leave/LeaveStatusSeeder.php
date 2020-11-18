<?php
namespace Database\Seeders\leave;

use App\Models\Leave\LeaveStatus;
use Illuminate\Database\Seeder;

class LeaveStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $leaveStatuses =  [
                [
                    'name' => 'Pending',
                    'description' => null,
                    'created_at' => now(),
                ],
                [
                    'name' => 'Scheduled',
                    'description' => null,
                    'created_at' => now(),
                ],
                [
                    'name' => 'Approved',
                    'description' => null,
                    'created_at' => now(),
                ],
                [
                    'name' => 'Rejected',
                    'description' => null,
                    'created_at' => now(),
                ],
                [
                    'name' => 'Canceled',
                    'description' => null,
                    'created_at' => now(),
                ],
                [
                    'name' => 'Taken',
                    'description' => null,
                    'created_at' => now(),
                ],
            ];

            LeaveStatus::insert($leaveStatuses);
        }
    }
}
