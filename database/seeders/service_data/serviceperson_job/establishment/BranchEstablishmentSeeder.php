<?php
namespace Database\Seeders\service_data\serviceperson_job\establishment;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchEstablishmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            DB::table('branch_establishment')->insert([
                // 1.   Operations
                ['branch_id' => 1, 'rank_id'   => 8, 'establishment' => 15],
                ['branch_id' => 1, 'rank_id'   => 7, 'establishment' => 26],
                ['branch_id' => 1, 'rank_id'   => 6, 'establishment' => 22],
                ['branch_id' => 1, 'rank_id'   => 5, 'establishment' => 96],
                ['branch_id' => 1, 'rank_id'   => 4, 'establishment' => 276],
                ['branch_id' => 1, 'rank_id'   => 3, 'establishment' => 369],
                ['branch_id' => 1, 'rank_id'   => 2, 'establishment' => 571],

                //2.    Administration
                ['branch_id' => 2, 'rank_id'   => 8, 'establishment' => 12],
                ['branch_id' => 2, 'rank_id'   => 7, 'establishment' => 30],
                ['branch_id' => 2, 'rank_id'   => 6, 'establishment' => 16],
                ['branch_id' => 2, 'rank_id'   => 5, 'establishment' => 80],
                ['branch_id' => 2, 'rank_id'   => 4, 'establishment' => 159],
                ['branch_id' => 2, 'rank_id'   => 3, 'establishment' => 160],
                ['branch_id' => 2, 'rank_id'   => 2, 'establishment' => 199],

                //3.    Logistics
                ['branch_id' => 3, 'rank_id'   => 8, 'establishment' => 9],
                ['branch_id' => 3, 'rank_id'   => 7, 'establishment' => 25],
                ['branch_id' => 3, 'rank_id'   => 6, 'establishment' => 20],
                ['branch_id' => 3, 'rank_id'   => 5, 'establishment' => 50],
                ['branch_id' => 3, 'rank_id'   => 4, 'establishment' => 150],
                ['branch_id' => 3, 'rank_id'   => 3, 'establishment' => 186],
                ['branch_id' => 3, 'rank_id'   => 2, 'establishment' => 279],

                //2.    Engineer
                ['branch_id' => 4, 'rank_id'   => 8, 'establishment' => 6],
                ['branch_id' => 4, 'rank_id'   => 7, 'establishment' => 10],
                ['branch_id' => 4, 'rank_id'   => 6, 'establishment' => 9],
                ['branch_id' => 4, 'rank_id'   => 5, 'establishment' => 35],
                ['branch_id' => 4, 'rank_id'   => 4, 'establishment' => 103],
                ['branch_id' => 4, 'rank_id'   => 3, 'establishment' => 163],
                ['branch_id' => 4, 'rank_id'   => 2, 'establishment' => 229],
            ]);
        });
    }
}
