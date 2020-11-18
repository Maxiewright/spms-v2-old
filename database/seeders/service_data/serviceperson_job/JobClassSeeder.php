<?php
namespace Database\Seeders\service_data\serviceperson_job;

use App\Models\System\Serviceperson\CareerManagement\Job\JobClass;
use Illuminate\Database\Seeder;

class JobClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobClasses = [
            [
                'name' => 'Senior',
                'slug' => 'Snr',
                'description' => 'A Tradesman that has attain the Rank of Sargent.',
            ],
            [
                'name' => 'Class 1',
                'slug' => 'C1',
                'description' => 'A highly skill and experienced tradesman who has specialist knowledge, or who is capable of taking charge and supervising other in his trade.',
            ],
            [
                'name' => 'Class 2',
                'slug' => 'C2',
                'description' => 'A full trained and experienced Tradesman who is capable of performing and task appropriate to his trade proficiency without detailed supervision.',
            ],
            [
                'name' => 'Class 3',
                'slug' => 'C3',
                'description' => 'A tradesman who his been trained in his trade, but who lacks experience, and still needs some guidance and supervision.',
            ],
            [
                'name' => 'Instructor',
                'slug' => 'Inst',
                'description' => 'A Tradesman that has attain the Rank of Sargent.',
            ],
        ];
        JobClass::insert($jobClasses);
    }
}
