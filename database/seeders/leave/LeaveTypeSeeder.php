<?php
namespace Database\Seeders\leave;

use App\Models\Leave\LeaveType;
use Illuminate\Database\Seeder;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $leaveTypes = [
                [
                    'name' => 'Privilege Leave',
                    'slug' => 'PL',
                    'description' => 'This is Annual Leave that is most commonly referred to as Privilege Leave',
                    'created_at' => '2020-03-11 06:55:00',
                ],
                [
                    'name' => 'Sick Leave',
                    'slug' => 'SL',
                    'description' => 'This level is grated by the Medical Officer and approved by an Officer Commanding if the serviceperson is deemed sick',
                    'created_at' => '2020-03-11 06:55:00',
                ],
                [
                    'name' => 'Special Leave',
                    'slug' => 'SpL',
                    'description' => 'Special Leave can be taken by those selected to represent the country or region in sports or for the purpose of sitting an examination.',
                    'created_at' => '2020-03-11 06:55:00',
                ],
                [
                    'name' => 'Terminal Leave',
                    'slug' => 'TL',
                    'description' => 'On completion of engagement or on retirement, personnel will be eligible for the grant of 28 days terminal leave which will be taken so as to end on the date of discharge or retirement',
                    'created_at' => '2020-03-11 06:55:00',
                ],
                [
                    'name' => 'Embarkation Leave',
                    'slug' => 'EL',
                    'description' => 'Granted to Serviceperson leaving the country on course or duty',
                    'created_at' => '2020-03-11 06:55:00',
                ],
                [
                    'name' => 'Disembarkation Leave',
                    'slug' => 'DL',
                    'description' => 'Leave granted on return to the country from course or duty abroad for period exceeding three months',
                    'created_at' => '2020-03-11 06:55:00',
                ],
                [
                    'name' => 'Maternity Leave',
                    'slug' => 'ML',
                    'description' => 'Expectant mothers can proceed on maternity leave prior to the birth of their child.',
                    'created_at' => '2020-03-11 06:55:00',
                ],
                [
                    'name' => 'Compassionate Leave',
                    'slug' => 'CL',
                    'description' => 'For urgent reasons of an exceptional or personal nature.',
                    'created_at' => '2020-03-11 06:55:00',
                ],

            ];

            LeaveType::insert($leaveTypes);
        }

    }
}
