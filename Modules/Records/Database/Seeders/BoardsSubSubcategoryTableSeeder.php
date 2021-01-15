<?php

namespace Modules\Records\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Records\Entities\Index\FileSubSubcategory;

class BoardsSubSubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $boardsSubGroups = [
            //31.	Board of Inquiry TTR
            [
                'id' => 311,
                'name' => 'Board of Inquiry (Policy)',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 312,
                'name' => '8231 Pte Jones S of C Coy – AWOL',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 313,
                'name' => 'Destruction of Camp Omega',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 314,
                'name' => 'Loss of 9mm Browning Pistol SN 245 py 98711 at Camp Cumuto A Coy on 14 June 1990',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 315,
                'name' => 'Shooting Incident involving LCpl Romeo',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 316,
                'name' => 'Shooting Incident involving Pte Boiselle J',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 317,
                'name' => 'Shooting Incident involving LCpl Haynes at Chag Market',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 318,
                'name' => 'Explosion at B Coy Stores – 8123 Pte Glasgow',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 319,
                'name' => 'Loss of SLR SN AD 6417396 at DFHQ (VDF) - Pte Gajadhar',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3110,
                'name' => 'Loss of 39 Galil Magazines',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3111,
                'name' => 'Loss of Grenade L2 HE',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3112,
                'name' => 'Inquest into Death of Civilian John Ottley on 25 July 1994',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3113,
                'name' => 'Missing .38 Revolver',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3114,
                'name' => 'Loss of Pistol SN 75C66598 by 2Lt S Subero',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3115,
                'name' => 'Missing 6mm / .35 Baby Browning Pistol',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3116,
                'name' => 'Stolen Revolver CTC',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3117,
                'name' => 'Shooting of 8951 Pte Smart M',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3118,
                'name' => 'L2 A2 Anti-Personnel Grenade',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3119,
                'name' => 'Death of 4495 Pte Wight D',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3120,
                'name' => '20.	Board of Inquiry – Injuries to Soldiers during Tropical Storm Bret on 8 August 1993',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3121,
                'name' => 'Board of Inquiry – Death of 8129 Pte Cordner J',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3122,
                'name' => 'Regimental Inquiry – Missing Plywood Sheets',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3123,
                'name' => 'Board of Inquiry – Missing Chain Saw (CCC)',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3124,
                'name' => 'Board of Inquiry – Mr Barnes (FCPO Office)',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3125,
                'name' => 'Board of Inquiry – Death of 8938 Pte Dewen G',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3126,
                'name' => 'Death of 4706 Pte Greenidge C',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3127,
                'name' => 'Death of Witness Clint Huggins',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3128,
                'name' => 'Death of Pte Richards C',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3129,
                'name' => 'Board of Inquiry – Shooting of 8236 Pte Lougheed G',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3130,
                'name' => 'Missing Galil Magazine (2TTR)',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3131,
                'name' => 'Loss of Service Weapon (PO Cadiz)',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3132,
                'name' => 'CCC Vehicle TBA 3884',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3133,
                'name' => 'Wearing of T&T’s Issue Army Uniform by Civilians',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3134,
                'name' => 'Board of Inquiry into the Missing Radio Motorola Portable MTX 838',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3135,
                'name' => 'Board of Inquiry into the Circumstances which led to the Discharge of A Weapon at CCC Hq Beetham Estate POS on 8 June 1996',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3136,
                'name' => 'Shooting Incident 9568 Rec Lara N',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3137,
                'name' => 'Board of Inquiry – Service Vehicle 3TTR90',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3138,
                'name' => 'Board of Inquiry – Incident involving Mr Flemming',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3139,
                'name' => 'Death of Commander Penco',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3140,
                'name' => 'Board of Inquiry – Missing Sig Sauer – Mech Mitchell S',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3141,
                'name' => 'Board of Inquiry – Incident involving Lt Mohammed-Affonso',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3142,
                'name' => 'Board of Inquiry – Incident involving Lt D Barnes',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3143,
                'name' => 'Board of Inquiry - 9150 Pte Ward D',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3144,
                'name' => 'Board of Inquiry – Accident involving vehicle 3TTR102',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3145,
                'name' => 'Board of Inquiry – 9210 Rec Arneaud H',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3146,
                'name' => 'Board of Inquiry – 9038 Pte Alfonso C',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3147,
                'name' => 'Board of Inquiry – 0118 Lt NA Pantin',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3148,
                'name' => 'Board of Inquiry – 9377 Pte Young A',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3149,
                'name' => 'Board of Inquiry – 8793 Pte Moore I',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3150,
                'name' => 'Board of Inquiry – Capt GT Griffith',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3168,
                'name' => 'Board of Inquiry – Inquires during Weedeater 02',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3169,
                'name' => 'Board of Inquiry – Alleged beating by soldiers',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3192,
                'name' => 'Board of Inquiry – Circumstances which led to 11478 Ex Rec(F) Browne
                    Trg Coy sustaining injuries to her back on Friday 26 Dec 05	Board of Inquiry – Investigation into the circumstances surrounding',
                'file_subcategory_id' => 31,
            ],
            [
                'id' => 3193,
                'name' => 'Board of Inquiry – Investigation into the circumstances surrounding
                    The incident whereby Sgt Williams shot Mr R Smith on Wed 21 Feb 07 ',
                'file_subcategory_id' => 31,
            ],


            //32.   Board of Inquiry CG

            [
                'id' => 321,
                'name' => 'Board of Inquiry – Policy',
                'file_subcategory_id' => 32,
            ],
            [
                'id' => 322,
                'name' => 'Breaking in of #3 and #4 Bunker at Pt Gourde',
                'file_subcategory_id' => 32,
            ],
            [
                'id' => 323,
                'name' => 'Loss of 9mm Browning on Board TTS Cascadura',
                'file_subcategory_id' => 32,
            ],
            [
                'id' => 324,
                'name' => 'Loss of TTS Matura',
                'file_subcategory_id' => 32,
            ],
            [
                'id' => 325,
                'name' => 'Accident Involving 4CG12 and Death of CPO Parasram on 10 Nov 91',
                'file_subcategory_id' => 32,
            ],
            [
                'id' => 326,
                'name' => 'Loss of one (1) Midland Land loss Radio #024375 from on Board TTS Carenage',
                'file_subcategory_id' => 32,
            ],
            [
                'id' => 327,
                'name' => 'Shooting Incident on Audrey Jeffers on 30 April 1993',
                'file_subcategory_id' => 32,
            ],
            [
                'id' => 328,
                'name' => 'Treatment of Crew on Pirogue',
                'file_subcategory_id' => 32,
            ],
            [
                'id' => 329,
                'name' => 'Board of Inquiry CG Vessel TTS Cascadura (CG6)',
                'file_subcategory_id' => 32,
            ],
            [
                'id' => 3210,
                'name' => 'Damage of TTS Roxborough (CG39) on 30 June 1995',
                'file_subcategory_id' => 32,
            ],
            [
                'id' => 3211,
                'name' => 'Report on lone Fly Pass of CG 203',
                'file_subcategory_id' => 32,
            ],
            [
                'id' => 3212,
                'name' => 'Damage of CG 202',
                'file_subcategory_id' => 32,
            ],

            //33.   Commissions Board

            [
                'id' => 331,
                'name' => 'Membership and Regulations',
                'file_subcategory_id' => 33,
            ],
            [
                'id' => 332,
                'name' => 'Invitation to Meeting',
                'file_subcategory_id' => 33,
            ],
            [
                'id' => 333,
                'name' => 'Minutes to Meeting',
                'file_subcategory_id' => 33,
            ],
            [
                'id' => 334,
                'name' => 'Matters Arising from Minutes',
                'file_subcategory_id' => 33,
            ],
            [
                'id' => 335,
                'name' => 'Application for Commission by Serving Members',
                'file_subcategory_id' => 33,
            ],
            [
                'id' => 336,
                'name' => 'Application for Commission by Civilians',
                'file_subcategory_id' => 33,
            ],
            [
                'id' => 337,
                'name' => 'Recommendation to Ministry – Commission',
                'file_subcategory_id' => 33,
            ],
            [
                'id' => 338,
                'name' => 'Recommendation to Ministry – Promotions',
                'file_subcategory_id' => 33,
            ],
            [
                'id' => 339,
                'name' => 'Short Service Commission Officers',
                'file_subcategory_id' => 33,
            ],
            [
                'id' => 3310,
                'name' => 'Honorary Commission',
                'file_subcategory_id' => 33,
            ],
            [
                'id' => 3311,
                'name' => 'Official Correspondence Address to Secretary',
                'file_subcategory_id' => 33,
            ],

            //34.   Boards of Survey

            [
                'id' => 341,
                'name' => 'Board of Survey (Policy) TTR',
                'file_subcategory_id' => 34,
            ],
            [
                'id' => 342,
                'name' => 'Disposal of Voting Machines',
                'file_subcategory_id' => 34,
            ],
            [
                'id' => 343,
                'name' => 'Board of Survey CG',
                'file_subcategory_id' => 34,
            ],
        ];

        FileSubSubcategory::insert($boardsSubGroups);
    }
}
