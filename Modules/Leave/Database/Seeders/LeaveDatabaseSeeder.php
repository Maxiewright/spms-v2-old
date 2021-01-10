<?php

namespace Modules\Leave\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LeaveDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call([
             LeaveAdjustmentReasonSeeder::class,
             LeaveStatusSeeder::class,
             LeaveGroupSeeder::class,
             LeaveTypeSeeder::class,
             LeaveGroupEntitlementSeeder::class,
         ]);
    }
}
