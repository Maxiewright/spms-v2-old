<?php

namespace Modules\Records\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Records\Entities\Index\FileSubSubcategory;

class SecuritySubSubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $securitySubGroups = [
            //141. Gov't Building
            [
                'id' => 1411,
                'name' => 'Government Building and Premises',
                'file_subcategory_id' => 141,
            ],
            [
                'id' => 1412,
                'name' => 'Control of Air Space',
                'file_subcategory_id' => 141,
            ],
            [
                'id' => 1413,
                'name' => 'Intelligence Office Operations (Int & Sy)',
                'file_subcategory_id' => 141,
            ],
            [
                'id' => 1414,
                'name' => 'Security Passes and Honorary Membership',
                'file_subcategory_id' => 141,
            ],
            [
                'id' => 1415,
                'name' => 'Camp and Station Pass',
                'file_subcategory_id' => 141,
            ],
            [
                'id' => 1416,
                'name' => 'Airport Authority Pass/Security',
                'file_subcategory_id' => 141,
            ],
            [
                'id' => 1417,
                'name' => 'Contact with Foreign Officials Embassies',
                'file_subcategory_id' => 141,
            ],
            [
                'id' => 1418,
                'name' => 'National Security Policy',
                'file_subcategory_id' => 141,
            ],
            [
                'id' => 1419,
                'name' => 'Port Facilities',
                'file_subcategory_id' => 141,
            ],

            //142. Jamaat Al Muslimeen - CLOSED

            //143. Guards

            [
                'id' => 1431,
                'name' => 'President Guard',
                'file_subcategory_id' => 143,
            ],
            [
                'id' => 1432,
                'name' => 'Prime Minister Guard',
                'file_subcategory_id' => 143,
            ],

            [
                'id' => 1433,
                'name' => 'CDS Guard / CO TTR / MNS',
                'file_subcategory_id' => 143,
            ],

            [
                'id' => 1434,
                'name' => 'War Dogs',
                'file_subcategory_id' => 143,
            ],

            [
                'id' => 1435,
                'name' => 'Orders',
                'file_subcategory_id' => 143,
            ],

            [
                'id' => 1436,
                'name' => 'Prison Duties/Guards',
                'file_subcategory_id' => 143,
            ],

            //144. Caribbean Security

            [
                'id' => 1441,
                'name' => 'Caribbean Security (Regional Security System)',
                'file_subcategory_id' => 144,
            ],
            [
                'id' => 1442,
                'name' => 'Caribbean Nations Security Conference (CANSEC)',
                'file_subcategory_id' => 144,
            ],

        ];

        FileSubSubcategory::insert($securitySubGroups);
    }
}
