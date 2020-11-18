<?php
namespace Database\Seeders\service_data\serviceperson_job;


use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPath;
use Illuminate\Database\Seeder;

class CareerPathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        Career Path
        {
            $careerPaths = [
//            1.  Combat / Combat Support
                [
                    'stream_id' => 1,
                    'name' => 'Infantry Rifleman',
                    'slug' => 'Rifleman',
                ],
                [
                    'stream_id' => 1,
                    'name' => 'Support Weapons',
                    'slug' => 'Gunner',
                ],
                [
                    'stream_id' => 1,
                    'name' => 'Physical Training Instructor',
                    'slug' => 'PTI',
                ],
                [
                    'stream_id' => 1,
                    'name' => 'Military Training Instructor',
                    'slug' => 'MTI',
                ],
//            2.  Operations
                [
                    'stream_id' => 2,
                    'name' => 'Operations',
                    'slug' => 'Ops Analyst',
                ],
//            3.  Intelligence
                [
                    'stream_id' => 3,
                    'name' => 'All Source Intelligence',
                    'slug' => 'Intel Analyst',
                ],
                [
                    'stream_id' => 3,
                    'name' => 'Counter-Intelligence',
                    'slug' => 'Counter Intel Analyst',
                ],
//            4.  Special Forces
                [
                    'stream_id' => 4,
                    'name' => 'Special Jungle Operations',
                    'slug' => 'Jungle Operator',
                ],
                [
                    'stream_id' => 4,
                    'name' => 'Special Urban Operations',
                    'slug' => 'Urban Operator',
                ],
                [
                    'stream_id' => 4,
                    'name' => 'Special Clandestine Operations',
                    'slug' => 'Clandestine Operator',
                ],
                [
                    'stream_id' => 4,
                    'name' => 'Special Operations Training',
                    'slug' => 'Training Operator',
                ],
                [
                    'stream_id' => 4,
                    'name' => 'Special Sniper Support',
                    'slug' => 'Sniper',
                ],
//            5.  Provost
                [
                    'stream_id' => 5,
                    'name' => 'Military Police',
                    'slug' => 'MP',
                ],
                [
                    'stream_id' => 5,
                    'name' => 'CID Special Agents',
                    'slug' => 'CID',
                ],
                [
                    'stream_id' => 5,
                    'name' => 'Intern and Resett',
                    'slug' => 'Intern',
                ],
                [
                    'stream_id' => 5,
                    'name' => 'Dog Handlers',
                    'slug' => 'K-9 Handler',
                ],
                [
                    'stream_id' => 5,
                    'name' => 'Investigations',
                    'slug' => 'Investigator',
                ],
//            6.  Clerical, legal and HR
                [
                    'stream_id' => 6,
                    'name' => 'Administrative Services',
                    'slug' => 'Admin Staff',
                ],
                [
                    'stream_id' => 6,
                    'name' => 'Human Resources / Organisation Development',
                    'slug' => 'HR',
                ],
//            7.  ICT
                [
                    'stream_id' => 7,
                    'name' => 'Signals and Telecommunications',
                    'slug' => 'Signaler',
                ],
                [
                    'stream_id' => 7,
                    'name' => 'Information and Knowledge Management',
                    'slug' => 'IT',
                ],
//            8.  Health and Human services
                [
                    'stream_id' => 8,
                    'name' => 'Medical',
                    'slug' => 'Medic',
                ],
                [
                    'stream_id' => 8,
                    'name' => 'Social Services',
                    'slug' => 'Social Worker',
                ],
//            9.  Musical
                [
                    'stream_id' => 9,
                    'name' => 'Regimental Band',
                    'slug' => 'Band Musician',
                ],
                [
                    'stream_id' => 9,
                    'name' => 'Corps of Drums',
                    'slug' => 'Drums Musician',
                ],
                [
                    'stream_id' => 10,
                    'name' => 'Steal Orchestra',
                    'slug' => 'Stealpan Musician',
                ],
//            10. Supply Services
                [
                    'stream_id' => 10,
                    'name' => 'Supply and Financial Management',
                    'slug' => 'Finance',
                ],
                [
                    'stream_id' => 10,
                    'name' => 'Warehousing and Storage',
                    'slug' => 'Warehouseman',
                ],
                [
                    'stream_id' => 10,
                    'name' => 'Material and Clothing Services',
                    'slug' => 'Material and Clothing Technician ',
                ],
//            11. Transportation
                [
                    'stream_id' => 11,
                    'name' => 'Dispatch Riders',
                    'slug' => 'Dispatch Rider',
                ],
                [
                    'stream_id' => 11,
                    'name' => 'Drivers',
                    'slug' => 'Driver',
                ],
//            12. Food and Catering Services
                [
                    'stream_id' => 9,
                    'name' => 'Chefs',
                    'slug' => 'Chef',
                ],
                [
                    'stream_id' => 9,
                    'name' => 'Stewards',
                    'slug' => 'Steward',
                ],
//            13. Engineer Artisan
                [
                    'stream_id' => 13,
                    'name' => 'Carpenters',
                    'slug' => 'Carpenter',
                ],
                [
                    'stream_id' => 13,
                    'name' => 'Masons',
                    'slug' => 'Mason',
                ],
                [
                    'stream_id' => 13,
                    'name' => 'Plumbers',
                    'slug' => 'Plumber',
                ],
                [
                    'stream_id' => 13,
                    'name' => 'Welders',
                    'slug' => 'Welder',
                ],
//            14. Engineer Specialist
                [
                    'stream_id' => 14,
                    'name' => 'Operators/Drivers',
                    'slug' => 'Operator/Driver',
                ],
                [
                    'stream_id' => 14,
                    'name' => 'Combat Engineers',
                    'slug' => 'Combat Engr',
                ],
                [
                    'stream_id' => 14,
                    'name' => 'Mechanics',
                    'slug' => 'Mechanic',
                ],
                [
                    'stream_id' => 14,
                    'name' => 'Surveyors',
                    'slug' => 'Surveyor',
                ],
                [
                    'stream_id' => 14,
                    'name' => 'Draughtsmen',
                    'slug' => 'Draughtsman',
                ],
                [
                    'stream_id' => 14,
                    'name' => 'Health, Safety, Security and the Environment',
                    'slug' => 'HSO',
                ],
//            15. Engineer Technician
                [
                    'stream_id' => 15,
                    'name' => 'Electricians',
                    'slug' => 'Electrician',
                ],
                [
                    'stream_id' => 15,
                    'name' => 'Auto Electricians',
                    'slug' => 'Auto Electrician',
                ],
                [
                    'stream_id' => 15,
                    'name' => 'Air Condition/Refrigeration Technicians',
                    'slug' => 'AirCon Technician',
                ],
                [
                    'stream_id' => 15,
                    'name' => 'Machinists',
                    'slug' => 'Machinist',
                ],
                [
                    'stream_id' => 15,
                    'name' => 'Auto Body Technicians',
                    'slug' => 'Auto Body Technician',
                ],
                [
                    'stream_id' => 15,
                    'name' => 'Battery and Tyre Technicians',
                    'slug' => 'Battery/Tyre Technician',
                ],
            ];
            CareerPath::insert($careerPaths);
        }
    }
}
