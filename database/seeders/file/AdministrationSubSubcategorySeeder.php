<?php
namespace Database\Seeders\file;

use App\Models\System\Universal\Polymorphic\File\FileSubSubcategory;
use Illuminate\Database\Seeder;

class AdministrationSubSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $administrationSubGroups = [
                //21. 	Accident
                [
                    'id' => 211,
                    'name' => 'Accidents TTR Vehicles',
                    'file_subcategory_id' => 21,
                ],
                [
                    'id' => 212,
                    'name' => 'Accidents TTCG Vehicles',
                    'file_subcategory_id' => 21,
                ],
                [
                    'id' => 213,
                    'name' => 'Accidents TTAG Vehicles',
                    'file_subcategory_id' => 21,
                ],

                [
                    'id' => 214,
                    'name' => 'Accidents TTDF Vehicles',
                    'file_subcategory_id' => 21,
                ],
                [
                    'id' => 215,
                    'name' => 'Accidents TTDFR Vehicles',
                    'file_subcategory_id' => 21,
                ],

//                22.Chaplain
                [
                    'id' => 221,
                    'name' => 'Chaplain of the Defence Force',
                    'file_subcategory_id' => 221,
                ],
//                23.Arms / Ammunition
                [
                    'id' => 231,
                    'name' => 'Arms and Ammunition / Explosives',
                    'file_subcategory_id' => 23,
                ],
                [
                    'id' => 232,
                    'name' => 'Bomb Disposal',
                    'file_subcategory_id' => 23,
                ],
                [
                    'id' => 233,
                    'name' => 'Powder Magazine / Bunkers',
                    'file_subcategory_id' => 23,
                ],
                [
                    'id' => 234,
                    'name' => 'Torpedo found in Moruga',
                    'file_subcategory_id' => 23,
                ],
                [
                    'id' => 235,
                    'name' => 'Firearm User License / Permit',
                    'file_subcategory_id' => 23,
                ],
                [
                    'id' => 236,
                    'name' => 'Tucker Valley / La Sieva Range',
                    'file_subcategory_id' => 23,
                ],
                [
                    'id' => 237,
                    'name' => 'Request for Ammo',
                    'file_subcategory_id' => 23,
                ],
                [
                    'id' => 238,
                    'name' => 'Arms/Ammo Appendix',
                    'file_subcategory_id' => 23,
                ],
                [
                    'id' => 239,
                    'name' => 'Ammo State',
                    'file_subcategory_id' => 23,
                ],
                [
                    'id' => 2310,
                    'name' => 'Arms & Ammo Safe Custody',
                    'file_subcategory_id' => 23,
                ],
                [
                    'id' => 2311,
                    'name' => 'Ammo User Inspection Report/ Defects',
                    'file_subcategory_id' => 23,
                ],

//                24.Assistance Civilians / Organisations
                [
                    'id' => 241,
                    'name' => 'Cadet Force / Cadet Force Advisory Committee',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 242,
                    'name' => 'Red Cross / St Johns Ambulance Brigade' ,
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 243,
                    'name' => 'Boys Scout',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 244,
                    'name' => 'Girls Guide',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 245,
                    'name' => 'T & T Legion / Salvation Army',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 246,
                    'name' => 'Road Safety Association',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 247,
                    'name' => 'All Other Group / Organizations',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 248,
                    'name' => 'Carnival Celebrations / Security',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 249,
                    'name' => 'Servol',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 2410,
                    'name' => 'Request for Hall of Resid / Chag Play Field ',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 2411,
                    'name' => 'Defence Force Community Caravan',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 2412,
                    'name' => 'Assitance by Utility & Engineering Battalion',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 2413,
                    'name' => 'Blind / Deaf Welfare Association',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 2414,
                    'name' => 'Assitance to Ministry & Government Departments',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 2415,
                    'name' => 'Request for Regiment Band / Steel Band',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 2416,
                    'name' => 'Youth Camp / MYLAT - MYPART / Army Youth Group',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 2417,
                    'name' => 'Request for Tents and Other Matters',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 2418,
                    'name' => 'Request for Transport',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 2419,
                    'name' => 'Ex-Sevicemen Association',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 2420,
                    'name' => 'Career Guidance / Info on Defence Forcer / Displays',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 2421,
                    'name' => 'Assitance to Military Organizations (with training, hosuing etc)',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 2422,
                    'name' => 'Request for info on Military Clothing / Equipment / Personnel',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 2423,
                    'name' => 'Assistance to Rehabilitation Centers',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 2424,
                    'name' => 'Civilian Conservation Corps / Reintroduction of CC opened from 2002 / Hand Over / Take Over Document ',
                    'file_subcategory_id' => 24,
                ],
                [
                    'id' => 2425,
                    'name' => 'President Award Scheme',
                    'file_subcategory_id' => 24,
                ],

//                25.Crsis / Disasters
                [
                    'id' => 251,
                    'name' => 'National Emergency Relief Org NERO / NEMA / CDERA & OFDA',
                    'file_subcategory_id' => 25,
                ],
                [
                    'id' => 252,
                    'name' => 'Flood Relief / Natural Disasters',
                    'file_subcategory_id' => 25,
                ],
                [
                    'id' => 253,
                    'name' => 'Hurricane',
                    'file_subcategory_id' => 25,
                ],
                [
                    'id' => 254,
                    'name' => 'Volcano Eruptions',
                    'file_subcategory_id' => 25,
                ],
                [
                    'id' => 255,
                    'name' => 'Industrial Crisis',
                    'file_subcategory_id' => 25,
                ],
                [
                    'id' => 256,
                    'name' => 'Disaster Preparedness/ODPM',
                    'file_subcategory_id' => 25,
                ],
                [
                    'id' => 257,
                    'name' => 'CARICOM Disaster Relief / ANTIGUA Disaster Relief',
                    'file_subcategory_id' => 25,
                ],
                [
                    'id' => 258,
                    'name' => 'Committee of the International Decade of Natural Disasters',
                    'file_subcategory_id' => 25,
                ],
                [
                    'id' => 259,
                    'name' => 'Airport Emergency Plan',
                    'file_subcategory_id' => 25,
                ],

//                26.Communication
                [
                    'id' => 261,
                    'name' => 'Telephone / Wireless / Internet / Development of Local Area Network for DFHQ',
                    'file_subcategory_id' => 26,
                ],
                [
                    'id' => 262,
                    'name' => 'Telgram / Fax / Fax Numbers / Change of Address',
                    'file_subcategory_id' => 26,
                ],
                [
                    'id' => 263,
                    'name' => 'Intra Ministerial Network - Morne Diablo',
                    'file_subcategory_id' => 26,
                ],
                [
                    'id' => 264,
                    'name' => 'Threatening Phone Calls - Death Threats',
                    'file_subcategory_id' => 26,
                ],
//                27.Elections
                [
                    'id' => 271,
                    'name' => 'General Elections',
                    'file_subcategory_id' => 27,
                ],
                [
                    'id' => 272,
                    'name' => 'Local Government Elections',
                    'file_subcategory_id' => 27,
                ],
//                28.Equipment / Stationary
                [
                    'id' => 281,
                    'name' => 'Office Stationery',
                    'file_subcategory_id' => 28,
                ],
                [
                    'id' => 282,
                    'name' => 'Office Equipment',
                    'file_subcategory_id' => 28,
                ],
                [
                    'id' => 283,
                    'name' => 'Computers',
                    'file_subcategory_id' => 28,
                ],
                [
                    'id' => 284,
                    'name' => 'Mail Despatch',
                    'file_subcategory_id' => 28,
                ],
//                29.Survey
                [
                    'id' => 291,
                    'name' => 'Coastal / Surveillance of T & T Waters',
                    'file_subcategory_id' => 29,
                ],
                [
                    'id' => 292,
                    'name' => 'Environment Pollution',
                    'file_subcategory_id' => 29,
                ],
                [
                    'id' => 293,
                    'name' => 'Intl Maritime Organization / Institution of Maritime Affairs',
                    'file_subcategory_id' => 29,
                ],
                [
                    'id' => 294,
                    'name' => 'Ocean "98"',
                    'file_subcategory_id' => 29,
                ],
                [
                    'id' => 295,
                    'name' => 'Defence Force & Protective Service Employee Survey',
                    'file_subcategory_id' => 29,
                ],
//                210.Inspection
                [
                    'id' => 2101,
                    'name' => 'Camps and Stations',
                    'file_subcategory_id' => 210,
                ],
                [
                    'id' => 2102,
                    'name' => 'Government Quarters and Hiring',
                    'file_subcategory_id' => 210,
                ],                [
                    'id' => 2103,
                    'name' => 'Admin Inspections',
                    'file_subcategory_id' => 210,
                ],                [
                    'id' => 2104,
                    'name' => 'Admin Inspection Returns',
                    'file_subcategory_id' => 210,
                ],
//                211.Invitations
                [
                    'id' => 2111,
                    'name' => 'To Military Functions',
                    'file_subcategory_id' => 211,
                ],
                [
                    'id' => 2112,
                    'name' => 'From Civilian Org / Military History',
                    'file_subcategory_id' => 211,
                ],
                [
                    'id' => 2113,
                    'name' => 'Invitation List',
                    'file_subcategory_id' => 211,
                ],
//                212.Models / Awards / Flags
                [
                    'id' => 2121,
                    'name' => 'Long Service Award',
                    'file_subcategory_id' => 212,
                ],
                [
                    'id' => 2122,
                    'name' => 'National Award',
                    'file_subcategory_id' => 212,
                ],
                [
                    'id' => 2123,
                    'name' => 'Long Service Award Certificates (New File)',
                    'file_subcategory_id' => 212,
                ],
                [
                    'id' => 2124,
                    'name' => 'Medals / Award Forces Records',
                    'file_subcategory_id' => 212,
                ],
                [
                    'id' => 2125,
                    'name' => 'Flags / Colours',
                    'file_subcategory_id' => 212,
                ],
                [
                    'id' => 2126,
                    'name' => 'South Caribbean Forces Records',
                    'file_subcategory_id' => 212,
                ],
                [
                    'id' => 2127,
                    'name' => 'Commissioning Parchments / Issue of Parchments to Warrant Officers',
                    'file_subcategory_id' => 212,
                ],
                [
                    'id' => 2128,
                    'name' => 'Defence Force Medals Awards',
                    'file_subcategory_id' => 212,
                ],
//                213.Orders / Interviews
                [
                    'id' => 2131,
                    'name' => 'MNS / Defence Council / Prime Minister / President',
                    'file_subcategory_id' => 213,
                ],
                [
                    'id' => 2132,
                    'name' => 'Chief of Defence Staff',
                    'file_subcategory_id' => 213,
                ],
                [
                    'id' => 2133,
                    'name' => 'Commanding Officers',
                    'file_subcategory_id' => 213,
                ],
                [
                    'id' => 2134,
                    'name' => 'Detachment Commanders',
                    'file_subcategory_id' => 213,
                ],
                [
                    'id' => 2135,
                    'name' => 'Interview with Media Personnel / Interview',
                    'file_subcategory_id' => 213,
                ],
                [
                    'id' => 2136,
                    'name' => 'Application for REdress of Complaint to Defence Council',
                    'file_subcategory_id' => 213,
                ],
//                214.Policy / Regulations
                [
                    'id' => 2141,
                    'name' => 'Defence Act / Law Regulations',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 2142,
                    'name' => 'Economic Exclusion Zone',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 2144,
                    'name' => 'T & T / Venezuala Fishing Agreement / Operations Ventri',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 2145,
                    'name' => 'T & T / Barbados Fishing Agreement',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 2146,
                    'name' => 'Compensation / Personnel Injured / Died on Duty',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 2147,
                    'name' => 'Burial at Sea',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 2148,
                    'name' => 'T & T / Venezuela Oil Spill Agreement',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 2149,
                    'name' => 'Illegal Fishing in T & T Waters',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 21410,
                    'name' => 'T & T / Venezuela Mixed Commissioning on Drugs',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 21411,
                    'name' => 'Geneva Conventions - Initl Convention on (SOLAS)',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 21412,
                    'name' => 'Flag State / Ship Riders Status on Forces Agreement',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 21413,
                    'name' => 'Draft Agreement between the Republic of Cuba and Republic of T & T',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 21414,
                    'name' => 'Visiting Forces Legislation in the Repubic of T & T',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 21415,
                    'name' => 'Trinidad and Tobago / Venezuela Bi-National Frontier Comission',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 21416,
                    'name' => 'Fishing Agreement between Triniad and Tobago and Guyana',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 21417,
                    'name' => 'Draft Legislation between T & T and UK',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 21418,
                    'name' => 'Maritime Boundary Delimitation Treaty Between Trinidad and Tobago',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 21419,
                    'name' => 'Policies – CDS (new file 2003)',
                    'file_subcategory_id' => 214,
                ],
                [
                    'id' => 21420,
                    'name' => 'Policy on HIV / AIDS',
                    'file_subcategory_id' => 214,
                ],
//                215.Visits
                [
                    'id' => 2151,
                    'name' => 'Visits of Foreign Ships',
                    'file_subcategory_id' => 215,
                ],
                [
                    'id' => 2152,
                    'name' => 'Requests to Visit Military Areas/ T / Bks',
                    'file_subcategory_id' => 215,
                ],
                [
                    'id' => 2153,
                    'name' => 'Visits of Foreign Officials / Military Personnel',
                    'file_subcategory_id' => 215,
                ],
                [
                    'id' => 2154,
                    'name' => 'Exchange of Visits',
                    'file_subcategory_id' => 215,
                ],
                [
                    'id' => 2155,
                    'name' => 'Visit to Foreign Countries / Guide for Clearance to Foreign Country',
                    'file_subcategory_id' => 215,
                ],
                [
                    'id' => 2156,
                    'name' => 'Visits of Foreign Aircraft',
                    'file_subcategory_id' => 215,
                ],
                [
                    'id' => 2157,
                    'name' => 'Ops Visits by CG Vessels / Aircrafts',
                    'file_subcategory_id' => 215,
                ],
                [
                    'id' => 2158,
                    'name' => 'Personnel visiting DFHQ on Business and Other Matters',
                    'file_subcategory_id' => 215,
                ],
                [
                    'id' => 2159,
                    'name' => 'Visits to Tobago',
                    'file_subcategory_id' => 215,
                ],

//                216.Command
                [
                    'id' => 2161,
                    'name' => 'T&T Defence Force – Restructuring DF / Presentation of Trinidad and Tobago / Cabinet Notes (new file)',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 2162,
                    'name' => 'T&T Regiment',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 2163,
                    'name' => 'T & T Coast Guard / T & T Air Guard',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 2164,
                    'name' => 'Company / Detachment / Military Police',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 2165,
                    'name' => 'Hand Over / Take Over Certificates – CDS / CO’s / Hand Over / Take Over Certificates – OC / HOD',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 2166,
                    'name' => 'Establishment of the DF as a Unit',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 2167,
                    'name' => 'Affiliation of TTR to British Force as a Unit',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 2168,
                    'name' => 'Establishment of a Welfare Unit / Relocation',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 2169,
                    'name' => 'Duties – Staff Officer / Snr NCO’s / ORs',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 21610,
                    'name' => 'Field Officers / Captain of the Week (DFHQ) / Orderly Officer',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 21611,
                    'name' => 'Establishment Engineering Unit',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 21612,
                    'name' => 'Establishment of the Human Resource Department',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 21613,
                    'name' => 'Establishment of an Environmental Post',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 21614,
                    'name' => 'Admin Re-organisation of Caribbean Fisheries Training & Development',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 21615,
                    'name' => 'Establishment RHQ',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 21616,
                    'name' => 'Establishment Sports Company',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 21617,
                    'name' => 'Establishment of Defence Force Steel Orchestra',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 21618,
                    'name' => 'Director of Projects / Logistics',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 21619,
                    'name' => 'Establishment of a Military Mortuary',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 21620,
                    'name' => 'Establishment of a new Research Unit',
                    'file_subcategory_id' => 216,
                ],
                [
                    'id' => 21621,
                    'name' => 'Establishment of the OCC Building',
                    'file_subcategory_id' => 216,
                ],

//                217.Government Institutions
                [
                    'id' => 2171,
                    'name' => 'Customs and Excise',
                    'file_subcategory_id' => 217,
                ],
                [
                    'id' => 2172,
                    'name' => 'Immigration',
                    'file_subcategory_id' => 217,
                ],
                [
                    'id' => 2173,
                    'name' => 'Organisations',
                    'file_subcategory_id' => 217,
                ],
                [
                    'id' => 2174,
                    'name' => 'Public Service Reform',
                    'file_subcategory_id' => 217,
                ],
                [
                    'id' => 2175,
                    'name' => 'Military Museum / Ex Servicemen / History of TTDF',
                    'file_subcategory_id' => 217,
                ],
                [
                    'id' => 2176,
                    'name' => 'Strategic Service Agency (SSA (New File) / SIA',
                    'file_subcategory_id' => 217,
                ],
//                218.Publication / Circular Memorandum
                [
                    'id' => 2181,
                    'name' => 'News Letters / Publications / Emails',
                    'file_subcategory_id' => 218,
                ],
                [
                    'id' => 2182,
                    'name' => 'Circular Memorandum',
                    'file_subcategory_id' => 218,
                ],
                [
                    'id' => 2183,
                    'name' => 'Press Release / Newspapers',
                    'file_subcategory_id' => 218,
                ],
                [
                    'id' => 2184,
                    'name' => 'Regiment / Coast Guard Magazine / Defence Force Magazine	/ Calendar',
                    'file_subcategory_id' => 218,
                ],
                [
                    'id' => 2185,
                    'name' => 'Subversive Literature',
                    'file_subcategory_id' => 218,
                ],
                [
                    'id' => 2186,
                    'name' => 'Defence Force Library (New File)',
                    'file_subcategory_id' => 218,
                ],
//                219.Vehicles / Military ID / Military Drivers Permit
                [
                    'id' => 2191,
                    'name' => 'Vehicle State',
                    'file_subcategory_id' => 219,
                ],
                [
                    'id' => 2192,
                    'name' => 'Vehicle Repairs / Rental',
                    'file_subcategory_id' => 219,
                ],
                [
                    'id' => 2193,
                    'name' => 'Priority Bus Route Pass',
                    'file_subcategory_id' => 219,
                ],
                [
                    'id' => 2194,
                    'name' => 'Military Driving Permits / Military ID Cards',
                    'file_subcategory_id' => 219,
                ],
                [
                    'id' => 2195,
                    'name' => 'Licensing of Official Vehicles',
                    'file_subcategory_id' => 219,
                ],
//                220.Agriculture
                [
                    'id' => 2201,
                    'name' => 'Defence Force Agriculture Project',
                    'file_subcategory_id' => 220,
                ],
//                221.Private Companies
                [
                    'id' => 2211,
                    'name' => 'Companies willing to do Business with TTDF',
                    'file_subcategory_id' => 220,
                ],
                [
                    'id' => 2212,
                    'name' => 'Financial Concepts Limited',
                    'file_subcategory_id' => 220,
                ],
            ];

            FileSubSubcategory::insert($administrationSubGroups);
        }
    }
}
