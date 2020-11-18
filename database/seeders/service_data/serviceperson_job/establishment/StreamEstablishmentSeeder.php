<?php
namespace Database\Seeders\service_data\serviceperson_job\establishment;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StreamEstablishmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            DB::table('stream_establishment')->insert([
                //1. Combat / Combat Support
                ['stream_id' => 1, 'rank_id'   => 8, 'establishment' => 8],
                ['stream_id' => 1, 'rank_id'   => 7, 'establishment' => 13],
                ['stream_id' => 1, 'rank_id'   => 6, 'establishment' => 10],
                ['stream_id' => 1, 'rank_id'   => 5, 'establishment' => 45],
                ['stream_id' => 1, 'rank_id'   => 4, 'establishment' => 140],
                ['stream_id' => 1, 'rank_id'   => 3, 'establishment' => 155],
                ['stream_id' => 1, 'rank_id'   => 2, 'establishment' => 535],
                //2. Operations
                ['stream_id' => 2, 'rank_id'   => 8, 'establishment' => 2],
                ['stream_id' => 2, 'rank_id'   => 7, 'establishment' => 5],
                ['stream_id' => 2, 'rank_id'   => 6, 'establishment' => 3],
                ['stream_id' => 2, 'rank_id'   => 5, 'establishment' => 5],
                ['stream_id' => 2, 'rank_id'   => 4, 'establishment' => 7],
                ['stream_id' => 2, 'rank_id'   => 3, 'establishment' => 9],
                ['stream_id' => 2, 'rank_id'   => 2, 'establishment' => 17],
                // 3. Intelligence
                ['stream_id' => 3, 'rank_id'   => 8, 'establishment' => 2],
                ['stream_id' => 3, 'rank_id'   => 7, 'establishment' => 4],
                ['stream_id' => 3, 'rank_id'   => 6, 'establishment' => 2],
                ['stream_id' => 3, 'rank_id'   => 5, 'establishment' => 12],
                ['stream_id' => 3, 'rank_id'   => 4, 'establishment' => 31],
                ['stream_id' => 3, 'rank_id'   => 3, 'establishment' => 41],
                ['stream_id' => 3, 'rank_id'   => 2, 'establishment' => 8],
                // 4. Special Forces Operations Detachment
                ['stream_id' => 4, 'rank_id'   => 8, 'establishment' => 1],
                ['stream_id' => 4, 'rank_id'   => 7, 'establishment' => 1],
                ['stream_id' => 4, 'rank_id'   => 6, 'establishment' => 4],
                ['stream_id' => 4, 'rank_id'   => 5, 'establishment' => 21],
                ['stream_id' => 4, 'rank_id'   => 4, 'establishment' => 47],
                ['stream_id' => 4, 'rank_id'   => 3, 'establishment' => 62],
                ['stream_id' => 4, 'rank_id'   => 2, 'establishment' => 0],
                // 5.    Provost, War Dogs & Investigations
                ['stream_id' => 5, 'rank_id'   => 8, 'establishment' => 2],
                ['stream_id' => 5, 'rank_id'   => 7, 'establishment' => 3],
                ['stream_id' => 5, 'rank_id'   => 6, 'establishment' => 3],
                ['stream_id' => 5, 'rank_id'   => 5, 'establishment' => 13],
                ['stream_id' => 5, 'rank_id'   => 4, 'establishment' => 51],
                ['stream_id' => 5, 'rank_id'   => 3, 'establishment' => 102],
                ['stream_id' => 5, 'rank_id'   => 2, 'establishment' => 11],
                // 6. Clerical, Legal and Human Resource
                ['stream_id' => 6, 'rank_id'   => 8, 'establishment' => 7],
                ['stream_id' => 6, 'rank_id'   => 7, 'establishment' => 15],
                ['stream_id' => 6, 'rank_id'   => 6, 'establishment' => 6],
                ['stream_id' => 6, 'rank_id'   => 5, 'establishment' => 37],
                ['stream_id' => 6, 'rank_id'   => 4, 'establishment' => 81],
                ['stream_id' => 6, 'rank_id'   => 3, 'establishment' => 79],
                ['stream_id' => 6, 'rank_id'   => 2, 'establishment' => 92],
                // 7. Information Communication Technology
                ['stream_id' => 7, 'rank_id'   => 8, 'establishment' => 2],
                ['stream_id' => 7, 'rank_id'   => 7, 'establishment' => 4],
                ['stream_id' => 7, 'rank_id'   => 6, 'establishment' => 3],
                ['stream_id' => 7, 'rank_id'   => 5, 'establishment' => 17],
                ['stream_id' => 7, 'rank_id'   => 4, 'establishment' => 27],
                ['stream_id' => 7, 'rank_id'   => 3, 'establishment' => 32],
                ['stream_id' => 7, 'rank_id'   => 2, 'establishment' => 38],
                // 8. Health and Human Services
                ['stream_id' => 8, 'rank_id'   => 8, 'establishment' => 2],
                ['stream_id' => 8, 'rank_id'   => 7, 'establishment' => 8],
                ['stream_id' => 8, 'rank_id'   => 6, 'establishment' => 4],
                ['stream_id' => 8, 'rank_id'   => 5, 'establishment' => 18],
                ['stream_id' => 8, 'rank_id'   => 4, 'establishment' => 32],
                ['stream_id' => 8, 'rank_id'   => 3, 'establishment' => 30],
                ['stream_id' => 8, 'rank_id'   => 2, 'establishment' => 34],
                // 9. Musical
                ['stream_id' => 9, 'rank_id'   => 8, 'establishment' => 1],
                ['stream_id' => 9, 'rank_id'   => 7, 'establishment' => 3],
                ['stream_id' => 9, 'rank_id'   => 6, 'establishment' => 3],
                ['stream_id' => 9, 'rank_id'   => 5, 'establishment' => 8],
                ['stream_id' => 9, 'rank_id'   => 4, 'establishment' => 19],
                ['stream_id' => 9, 'rank_id'   => 3, 'establishment' => 19],
                ['stream_id' => 9, 'rank_id'   => 2, 'establishment' => 35],
                // 10. Supply App\Services\
                ['stream_id' => 10, 'rank_id'   => 8, 'establishment' => 6],
                ['stream_id' => 10, 'rank_id'   => 7, 'establishment' => 16],
                ['stream_id' => 10, 'rank_id'   => 6, 'establishment' => 13],
                ['stream_id' => 10, 'rank_id'   => 5, 'establishment' => 34],
                ['stream_id' => 10, 'rank_id'   => 4, 'establishment' => 76],
                ['stream_id' => 10, 'rank_id'   => 3, 'establishment' => 119],
                ['stream_id' => 10, 'rank_id'   => 2, 'establishment' => 108],
                // 11. Transportation
                ['stream_id' => 11, 'rank_id'   => 8, 'establishment' => 1],
                ['stream_id' => 11, 'rank_id'   => 7, 'establishment' => 2],
                ['stream_id' => 11, 'rank_id'   => 6, 'establishment' => 1],
                ['stream_id' => 11, 'rank_id'   => 5, 'establishment' => 7],
                ['stream_id' => 11, 'rank_id'   => 4, 'establishment' => 30],
                ['stream_id' => 11, 'rank_id'   => 3, 'establishment' => 29],
                ['stream_id' => 11, 'rank_id'   => 2, 'establishment' => 113],
                // 12. Food and Catering Services
                ['stream_id' => 12, 'rank_id'   => 8, 'establishment' => 2],
                ['stream_id' => 12, 'rank_id'   => 7, 'establishment' => 7],
                ['stream_id' => 12, 'rank_id'   => 6, 'establishment' => 6],
                ['stream_id' => 12, 'rank_id'   => 5, 'establishment' => 9],
                ['stream_id' => 12, 'rank_id'   => 4, 'establishment' => 44],
                ['stream_id' => 12, 'rank_id'   => 3, 'establishment' => 38],
                ['stream_id' => 12, 'rank_id'   => 2, 'establishment' => 58],
                // 13. Engineer Artisan
                ['stream_id' => 13, 'rank_id'   => 8, 'establishment' => 0],
                ['stream_id' => 13, 'rank_id'   => 7, 'establishment' => 1],
                ['stream_id' => 13, 'rank_id'   => 6, 'establishment' => 1],
                ['stream_id' => 13, 'rank_id'   => 5, 'establishment' => 5],
                ['stream_id' => 13, 'rank_id'   => 4, 'establishment' => 31],
                ['stream_id' => 13, 'rank_id'   => 3, 'establishment' => 66],
                ['stream_id' => 13, 'rank_id'   => 2, 'establishment' => 71],
                // 14. Engineer Specialist
                ['stream_id' => 14, 'rank_id'   => 8, 'establishment' => 5],
                ['stream_id' => 14, 'rank_id'   => 7, 'establishment' => 8],
                ['stream_id' => 14, 'rank_id'   => 6, 'establishment' => 7],
                ['stream_id' => 14, 'rank_id'   => 5, 'establishment' => 24],
                ['stream_id' => 14, 'rank_id'   => 4, 'establishment' => 53],
                ['stream_id' => 14, 'rank_id'   => 3, 'establishment' => 71],
                ['stream_id' => 14, 'rank_id'   => 2, 'establishment' => 108],
                // 15. Engineer Technician
                ['stream_id' => 15, 'rank_id'   => 8, 'establishment' => 1],
                ['stream_id' => 15, 'rank_id'   => 7, 'establishment' => 1],
                ['stream_id' => 15, 'rank_id'   => 6, 'establishment' => 1],
                ['stream_id' => 15, 'rank_id'   => 5, 'establishment' => 6],
                ['stream_id' => 15, 'rank_id'   => 4, 'establishment' => 19],
                ['stream_id' => 15, 'rank_id'   => 3, 'establishment' => 26],
                ['stream_id' => 15, 'rank_id'   => 2, 'establishment' => 50],
            ]);
            });

    }
}
