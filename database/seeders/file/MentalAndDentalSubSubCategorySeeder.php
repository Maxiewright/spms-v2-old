<?php
namespace Database\Seeders\file;

use App\Models\System\Universal\Polymorphic\File\FileSubSubcategory;
use Illuminate\Database\Seeder;

class MentalAndDentalSubSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $MentalAndDentalSubGroups = [
                //161. Medical

                [
                    'id' => 1611,
                    'name' => 'Duties DFMO',
                    'file_subcategory_id' => 161,
                ],
                [
                    'id' => 1612,
                    'name' => 'Dr V Pooran',
                    'file_subcategory_id' => 161,
                ],
                [
                    'id' => 1613,
                    'name' => 'Dr AW Charles',
                    'file_subcategory_id' => 161,
                ],
                [
                    'id' => 1614,
                    'name' => 'Dr F Bonterre – Psychiatrist',
                    'file_subcategory_id' => 161,
                ],
                [
                    'id' => 1615,
                    'name' => 'Dr R Tom Pack',
                    'file_subcategory_id' => 161,
                ],
                [
                    'id' => 1616,
                    'name' => 'Dental Services',
                    'file_subcategory_id' => 161,
                ],
                [
                    'id' => 1617,
                    'name' => 'Dr M Trotman	',
                    'file_subcategory_id' => 161,
                ],
                [
                    'id' => 1618,
                    'name' => 'Dr I Dowlat',
                    'file_subcategory_id' => 161,
                ],

                //162. Medical Matters

                [
                    'id' => 1621,
                    'name' => 'Medical Training',
                    'file_subcategory_id' => 162,
                ],
                [
                    'id' => 1622,
                    'name' => 'Assignment of a Nurse',
                    'file_subcategory_id' => 162,
                ],
                [
                    'id' => 1623,
                    'name' => 'Pharmacist',
                    'file_subcategory_id' => 162,
                ],
                [
                    'id' => 1624,
                    'name' => 'Families Clinic',
                    'file_subcategory_id' => 162,
                ],
                [
                    'id' => 1625,
                    'name' => 'Refund of Medical and Dental Expenses',
                    'file_subcategory_id' => 162,
                ],
                [
                    'id' => 1626,
                    'name' => 'Analysis Machine Equipment/Medical Equipment',
                    'file_subcategory_id' => 162,
                ],
                [
                    'id' => 1627,
                    'name' => 'Medical Treatment for TTDF Personnel',
                    'file_subcategory_id' => 162,
                ],
                [
                    'id' => 1628,
                    'name' => 'Medical Examination Report/PULEEMS',
                    'file_subcategory_id' => 162,
                ],
                [
                    'id' => 1629,
                    'name' => 'Proposals for Psychological Evaluation',
                    'file_subcategory_id' => 162,
                ],
                [
                    'id' => 16210,
                    'name' => 'Military Hospital',
                    'file_subcategory_id' => 162,
                ],

                //163. Medical Board

                [
                    'id' => 1631,
                    'name' => 'Medical Board',
                    'file_subcategory_id' => 163,
                ],


            ];

            FileSubSubcategory::insert($MentalAndDentalSubGroups);
        }
    }
}
