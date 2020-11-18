<?php
namespace Database\Seeders\file;

use App\Models\System\Universal\Polymorphic\File\FileSubSubcategory;
use Illuminate\Database\Seeder;

class FinancialAndAccountingMattersSubSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $financialandaccountingmattersSubGroups = [
                //71.	Estimates
                [
                    'id' => 711,
                    'name' => 'Estimates 1990',
                    'file_subcategory_id' => 71,
                ],
                [
                    'id' => 712,
                    'name' => 'Estimates 1991',
                    'file_subcategory_id' => 71,
                ],
                [
                    'id' => 713,
                    'name' => 'Estimates 1992',
                    'file_subcategory_id' => 71,
                ],
                [
                    'id' => 714,
                    'name' => 'Draft Estimates 1993',
                    'file_subcategory_id' => 71,
                ],
                [
                    'id' => 715,
                    'name' => 'Draft Estimates 1994',
                    'file_subcategory_id' => 71,
                ],
                [
                    'id' => 716,
                    'name' => 'Budget 1994',
                    'file_subcategory_id' => 71,
                ],
                [
                    'id' => 717,
                    'name' => 'Draft Estimates 1995',
                    'file_subcategory_id' => 71,
                ],
                [
                    'id' => 718,
                    'name' => 'Development Programme',
                    'file_subcategory_id' => 71,
                ],
                [
                    'id' => 719,
                    'name' => 'Draft Estimates 1999',
                    'file_subcategory_id' => 71,
                ],
                [
                    'id' => 7110,
                    'name' => 'Programme / Projects 2000 – (TTR & TTCG)',
                    'file_subcategory_id' => 71,
                ],
                [
                    'id' => 7111,
                    'name' => 'Draft Estimate 2001 / Budget, Medium Term Policy Framework',
                    'file_subcategory_id' => 71,
                ],
                [
                    'id' => 7112,
                    'name' => 'Draft Estimate 2008 and beyond',
                    'file_subcategory_id' => 71,
                ],

                //72. Allowances

                [
                    'id' => 721,
                    'name' => 'Acting/Responsibility Allowances',
                    'file_subcategory_id' => 72,
                ],
                [
                    'id' => 722,
                    'name' => 'Commuted Travelling Allowances',
                    'file_subcategory_id' => 72,
                ],
                [
                    'id' => 723,
                    'name' => 'Disturbance Allowance',
                    'file_subcategory_id' => 72,
                ],
                [
                    'id' => 724,
                    'name' => 'Home to Duty Travelling Allowance',
                    'file_subcategory_id' => 72,
                ],
                [
                    'id' => 725,
                    'name' => 'Living Out Allowance',
                    'file_subcategory_id' => 72,
                ],
                [
                    'id' => 726,
                    'name' => 'Official Travelling Allowance',
                    'file_subcategory_id' => 72,
                ],
                [
                    'id' => 727,
                    'name' => 'Ration Allowance',
                    'file_subcategory_id' => 72,
                ],
                [
                    'id' => 728,
                    'name' => 'Rent Allowance',
                    'file_subcategory_id' => 72,
                ],
                [
                    'id' => 729,
                    'name' => 'Subsistence Allowance / Hardlying Allowance',
                    'file_subcategory_id' => 72,
                ],
                [
                    'id' => 7210,
                    'name' => 'Trade Pay',
                    'file_subcategory_id' => 72,
                ],
                [
                    'id' => 7211,
                    'name' => 'Uniform Allowance / Civilian Clothing Allowance',
                    'file_subcategory_id' => 72,
                ],
                [
                    'id' => 7212,
                    'name' => 'Telephone Allowance',
                    'file_subcategory_id' => 72,
                ],
                [
                    'id' => 7213,
                    'name' => 'Overseas Travel Allowance',
                    'file_subcategory_id' => 72,
                ],

                //73. Pay Matters

                [
                    'id' => 731,
                    'name' => 'Pay Matters',
                    'file_subcategory_id' => 73,
                ],
                [
                    'id' => 732,
                    'name' => 'Pay Review / Special Service Pay',
                    'file_subcategory_id' => 73,
                ],
                [
                    'id' => 733,
                    'name' => 'Income Tax',
                    'file_subcategory_id' => 73,
                ],
                [
                    'id' => 734,
                    'name' => 'National Insurance',
                    'file_subcategory_id' => 73,
                ],
                [
                    'id' => 735,
                    'name' => 'Health Surcharge',
                    'file_subcategory_id' => 73,
                ],
                [
                    'id' => 736,
                    'name' => 'Terminal Benefits – Pension / Gratuity / Disability Allowance / Linking of Service for the purpose of Pension',
                    'file_subcategory_id' => 73,
                ],
                [
                    'id' => 737,
                    'name' => 'Condition of Service – Chief of Defence Staff',
                    'file_subcategory_id' => 73,
                ],
                [
                    'id' => 738,
                    'name' => 'Government Loans / Equity in Service',
                    'file_subcategory_id' => 73,
                ],
                [
                    'id' => 739,
                    'name' => 'WASA / T&TEC / TSTT Payments',
                    'file_subcategory_id' => 73,
                ],
                [
                    'id' => 7310,
                    'name' => '10.	Increased Benefits for Officers of the TTDF resulting of Injury or Death arising out of an in the course of Employment',
                    'file_subcategory_id' => 73,
                ],
                [
                    'id' => 7311,
                    'name' => 'Monthly Statement of Expenditure',
                    'file_subcategory_id' => 73,
                ],
                [
                    'id' => 7312,
                    'name' => 'Loss of Government Property',
                    'file_subcategory_id' => 73,
                ],

                //74. Tenders Board

                [
                    'id' => 741,
                    'name' => 'Aircraft / Helicopter',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 742,
                    'name' => 'Vehicle / Spares',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 743,
                    'name' => 'Clothing / Equipment',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 744,
                    'name' => 'TTS Chaguaramas / TTS Bucco Reef',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 745,
                    'name' => 'TTS Barracuda / TTS Cascadura (CG6',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 746,
                    'name' => 'TTS El Tucuche / TTS Naparima',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 747,
                    'name' => 'WASPS – TTS Plymouth, Caroni, Galeota, Moruga',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 748,
                    'name' => 'Pirogues / Life Boats',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 749,
                    'name' => 'Communication / Electronics',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 7410,
                    'name' => 'Harts Cut Vessels',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 7411,
                    'name' => 'Acquisition of Vessels / OPVs',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 7412,
                    'name' => 'Acquisition of Spares CG Vessels',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 7413,
                    'name' => 'Optical / Dental',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 7414,
                    'name' => 'Laundry Service',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 7415,
                    'name' => 'Humming Bird II & III',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 7416,
                    'name' => 'Food Stuff',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 7417,
                    'name' => 'Serviceability of Vessels, Vehicles & Aircraft',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 7418,
                    'name' => '18.	Coast Guard Patrol Boats (TTS Corozola & TTS Crown Point CG 7 and CG8)',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 7419,
                    'name' => 'TTS Bacolet Pt (CG 10)',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 7420,
                    'name' => 'TTS NELSON (CG20)	',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 7421,
                    'name' => 'TTS Gaspar Grande',
                    'file_subcategory_id' => 74,
                ],
                [
                    'id' => 7422,
                    'name' => 'TTS Chacachacare',
                    'file_subcategory_id' => 74,
                ],

                //75. Funds

                [
                    'id' => 751,
                    'name' => 'Transfer of Votes / Request for Addition Funds / TTR Sports Fund',
                    'file_subcategory_id' => 75,
                ],
                [
                    'id' => 752,
                    'name' => 'Audit Queries / Audit',
                    'file_subcategory_id' => 75,
                ],
                [
                    'id' => 753,
                    'name' => 'Crown Agents',
                    'file_subcategory_id' => 75,
                ],
                [
                    'id' => 754,
                    'name' => 'Imprest Cash',
                    'file_subcategory_id' => 75,
                ],
                [
                    'id' => 755,
                    'name' => 'CDS Fund / CO’s Fund / Welfare Fund',
                    'file_subcategory_id' => 75,
                ],
                [
                    'id' => 756,
                    'name' => 'Car Loans – Defence Force Officers',
                    'file_subcategory_id' => 75,
                ],
                [
                    'id' => 757,
                    'name' => 'Allocation of Funds to the Security Forces',
                    'file_subcategory_id' => 75,
                ],
                [
                    'id' => 758,
                    'name' => 'Regiment Central Account',
                    'file_subcategory_id' => 75,
                ],
                [
                    'id' => 759,
                    'name' => 'Accountable Advance',
                    'file_subcategory_id' => 75,
                ],
                [
                    'id' => 7510,
                    'name' => 'Specimen Signature',
                    'file_subcategory_id' => 75,
                ],
                [
                    'id' => 7511,
                    'name' => 'Fuelling Arrangements / Oil',
                    'file_subcategory_id' => 75,
                ],

            ];

            FileSubSubcategory::insert($financialandaccountingmattersSubGroups);
        }
    }
}
