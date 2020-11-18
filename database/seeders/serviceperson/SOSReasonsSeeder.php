<?php

namespace Database\Seeders\serviceperson;

use App\Models\System\Serviceperson\LookUp\SOSReasons;
use Illuminate\Database\Seeder;

class SOSReasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sosReasons = [
            [
                'name' => 'Service No Longer Required',
                'slug' => 'SNLR',
                'created_at' => '2020-07-05 10:10:00',
            ],
            [
                'name' => 'Completion of engagement',
                'slug' => 'CoE',
                'created_at' => '2020-07-05 10:10:00',
            ],
            [
                'name' => 'Misconduct',
                'slug' => 'Discipline',
                'created_at' => '2020-07-05 10:10:00',
            ],
            [
                'name' => 'Medically Unfit',
                'slug' => 'Medical',
                'created_at' => '2020-07-05 10:10:00',
            ],
            [
                'name' => 'Compassionate',
                'slug' => 'Compassionate',
                'created_at' => '2020-07-05 10:10:00',
            ],
            [
                'name' => 'Being attested but not finally approved',
                'slug' => 'Not Approved',
                'created_at' => '2020-07-05 10:10:00',
            ],
            [
                'name' => 'Inefficiency',
                'slug' => 'Inefficiency',
                'created_at' => '2020-07-05 10:10:00',
            ],
            [
                'name' => 'Improper enlistment',
                'slug' => 'Improper enlistment',
                'created_at' => '2020-07-05 10:10:00',
            ],
            [
                'name' => 'Misrepresentation on attestation',
                'slug' => 'Misrepresentation',
                'created_at' => '2020-07-05 10:10:00',
            ],
            [
                'name' => 'Civil court conviction',
                'slug' => 'Conviction ',
                'created_at' => '2020-07-05 10:10:00',
            ],
            [
                'name' => 'Cashiered',
                'slug' => 'Cashiered',
                'created_at' => '2020-07-05 10:10:00',
            ],
            [
                'name' => 'Completion of Commission',
                'slug' => 'Completion of Commission ',
                'created_at' => '2020-07-05 10:10:00',
            ],
        ];
        SOSReasons::insert($sosReasons);
    }
}
