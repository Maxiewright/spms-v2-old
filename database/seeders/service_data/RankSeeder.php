<?php
namespace Database\Seeders\service_data;

use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Database\Seeder;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $ranks = [
                [
                  'grade' => 'E1',
                  'regiment' => 'Recruit',
                  'regiment_slug' => 'Rec',
                  'coast_guard' => 'Recruit',
                  'coast_guard_slug' => 'Rec',
                  'air_guard' => 'Recruit',
                  'air_guard_slug' => 'Rec',
                ],
                [
                    'grade' => 'E2',
                    'regiment' => 'Private',
                    'regiment_slug' => 'Pte',
                    'coast_guard' => 'Ordinary Rate',
                    'coast_guard_slug' => 'OR',
                    'air_guard' => '{"Non-Technical":"Junior Aircraftman", "Technical": "Junior Technician"}',
                    'air_guard_slug' => '{"Non-Technical":"JAC", "Technical": "JT"}',
                ],
                [
                    'grade' => 'E3',
                    'regiment' => 'Lance Corporal',
                    'regiment_slug' => 'LCpl',
                    'coast_guard' => 'Able Rate',
                    'coast_guard_slug' => 'AR',
                    'air_guard' => '{"Non-Technical":"Senior Aircraftman", "Technical": "Senior Technician"}',
                    'air_guard_slug' => '{"Non-Technical":"SAC", "Technical": "ST"}',
                ],
                [
                    'grade' => 'E4',
                    'regiment' => 'Corporal',
                    'regiment_slug' => 'Cpl',
                    'coast_guard' => 'Leading Rate',
                    'coast_guard_slug' => 'LR',
                    'air_guard' => 'Corporal',
                    'air_guard_slug' => 'Cpl',
                ],
                [
                    'grade' => 'E5',
                    'regiment' => 'Sergeant',
                    'regiment_slug' => 'Sgt',
                    'coast_guard' => 'Petty Officer',
                    'coast_guard_slug' => 'PO',
                    'air_guard' => 'Sergeant',
                    'air_guard_slug' => 'Sgt',
                ],
                [
                    'grade' => 'E6',
                    'regiment' => 'Staff Sergeant',
                    'regiment_slug' => 'SSgt',
                    'coast_guard' => 'No equivalent',
                    'coast_guard_slug' => 'No equivalent',
                    'air_guard' => 'No equivalent',
                    'air_guard_slug' => 'No equivalent',
                ],
                [
                    'grade' => 'E7',
                    'regiment' => 'Warrant Officer Class 2',
                    'regiment_slug' => 'WO2',
                    'coast_guard' => 'Chief Petty Officer',
                    'coast_guard_slug' => 'CPO',
                    'air_guard' => 'Warrant Officer Class 2',
                    'air_guard_slug' => 'WO2',
                ],
                [
                    'grade' => 'E8',
                    'regiment' => 'Warrant Officer Class 1',
                    'regiment_slug' => 'WO1',
                    'coast_guard' => 'Fleet Chief Petty Officer',
                    'coast_guard_slug' => 'FCPO',
                    'air_guard' => 'Warrant Officer Class 1',
                    'air_guard_slug' => 'WO1',
                ],
                [
                    'grade' => 'O1',
                    'regiment' => 'Officer Cadet',
                    'regiment_slug' => 'OCdt',
                    'coast_guard' => 'Midshipman',
                    'coast_guard_slug' => 'Mid',
                    'air_guard' => 'Officer Cadet',
                    'air_guard_slug' => 'OCdt',
                ],
                [
                    'grade' => 'O2',
                    'regiment' => 'Second Lieutenant',
                    'regiment_slug' => '2 Lt',
                    'coast_guard' => 'Acting Sub Lieutenant',
                    'coast_guard_slug' => 'Ag Sub Lt',
                    'air_guard' => 'Pilot Officer',
                    'air_guard_slug' => 'Pl Off',
                ],
                [
                    'grade' => 'O3',
                    'regiment' => 'Lieutenant',
                    'regiment_slug' => 'Lt',
                    'coast_guard' => 'Sub Lieutenant',
                    'coast_guard_slug' => 'Sub Lt',
                    'air_guard' => 'Flying Officer',
                    'air_guard_slug' => 'Fg Off',
                ],
                [
                    'grade' => 'O4',
                    'regiment' => 'Captain',
                    'regiment_slug' => 'Capt',
                    'coast_guard' => 'Lieutenant',
                    'coast_guard_slug' => 'Lt',
                    'air_guard' => 'Flight Lieutenant',
                    'air_guard_slug' => 'Flt Lt',
                ],
                [
                    'grade' => 'O5',
                    'regiment' => 'Major',
                    'regiment_slug' => 'Maj',
                    'coast_guard' => 'Lieutenant Commander',
                    'coast_guard_slug' => 'Lt Cdr',
                    'air_guard' => 'Squadron Leader',
                    'air_guard_slug' => 'Sqn Ldr',
                ],
                [
                    'grade' => 'O6',
                    'regiment' => 'Lieutenant Colonel',
                    'regiment_slug' => 'Lt Col',
                    'coast_guard' => 'Commander',
                    'coast_guard_slug' => 'Cdr',
                    'air_guard' => 'Wing Commander',
                    'air_guard_slug' => 'Wg Commander',
                ],
                [
                    'grade' => 'O7',
                    'regiment' => 'Colonel',
                    'regiment_slug' => 'Col',
                    'coast_guard' => 'Captain',
                    'coast_guard_slug' => 'Capt',
                    'air_guard' => 'Group Captain',
                    'air_guard_slug' => 'Gp Capt',
                ],
                [
                    'grade' => 'O8',
                    'regiment' => 'Brigadier General',
                    'regiment_slug' => 'Brig Gen',
                    'coast_guard' => 'Commodore',
                    'coast_guard_slug' => 'Cmdre',
                    'air_guard' => 'Air Commodore',
                    'air_guard_slug' => 'Air Cmdre',
                ],
                [
                    'grade' => 'O9',
                    'regiment' => 'Major General',
                    'regiment_slug' => 'Maj Gen',
                    'coast_guard' => 'Rear Admiral',
                    'coast_guard_slug' => 'Radm',
                    'air_guard' => 'Air Vice Marshall',
                    'air_guard_slug' => 'AVM',
                ],
            ];

            Rank::insert($ranks);
        }
    }
}
