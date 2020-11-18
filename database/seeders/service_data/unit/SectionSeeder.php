<?php

namespace Database\Seeders\service_data\unit;

use App\Models\System\Serviceperson\Unit\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            [
                'name'=>'Platoon HQ',
                'slug'=>'Plt HQ',
                'created_at'=> now(),
            ],
            [
                'name'=>'1 Section',
                'slug'=>'1 Sect',
                'created_at'=> now(),
            ],
            [
                'name'=>'2 Section',
                'slug'=>'2 Sect',
                'created_at'=> now(),
            ],

            [
                'name'=>'3 Section',
                'slug'=>'3 Sect',
                'created_at'=> now(),
            ],

            /*
             [
                 'name'=>'4 Section',
                 'slug'=>'4 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'5 Section',
                 'slug'=>'5 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'6 Section',
                 'slug'=>'6 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'7 Section',
                 'slug'=>'7 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'8 Section',
                 'slug'=>'8 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'9 Section',
                 'slug'=>'9 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'10 Section',
                 'slug'=>' Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'11 Section',
                 'slug'=>'11 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'12 Section',
                 'slug'=>'12 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'13 Section',
                 'slug'=>'13 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'14 Section',
                 'slug'=>'14 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'15 Section',
                 'slug'=>'15 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'16 Section',
                 'slug'=>'16 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'17 Section',
                 'slug'=>'17 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'18 Section',
                 'slug'=>'18 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'19 Section',
                 'slug'=>'19 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'20 Section',
                 'slug'=>'20 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'21 Section',
                 'slug'=>'21 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'22 Section',
                 'slug'=>'22 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'23 Section',
                 'slug'=>'23 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'24 Section',
                 'slug'=>'24 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'25 Section',
                 'slug'=>'25 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'26 Section',
                 'slug'=>'26 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'27 Section',
                 'slug'=>'27 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'28 Section',
                 'slug'=>'28 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'29 Section',
                 'slug'=>'29 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'30 Section',
                 'slug'=>'30 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'31 Section',
                 'slug'=>'31 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'32 Section',
                 'slug'=>'32 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'33 Section',
                 'slug'=>'33 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'34 Section',
                 'slug'=>'34 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'35 Section',
                 'slug'=>'35 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'36 Section',
                 'slug'=>'36 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'37 Section',
                 'slug'=>'37 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'38 Section',
                 'slug'=>'38 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'39 Section',
                 'slug'=>'39 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'40 Section',
                 'slug'=>'40 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'41 Section',
                 'slug'=>'41 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'42 Section',
                 'slug'=>'42 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'43 Section',
                 'slug'=>'43 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'44 Section',
                 'slug'=>'44 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'45 Section',
                 'slug'=>'45 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'46 Section',
                 'slug'=>'46 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'47 Section',
                 'slug'=>'47 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'48 Section',
                 'slug'=>'48 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'49 Section',
                 'slug'=>'49 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'50 Section',
                 'slug'=>'50 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'51 Section',
                 'slug'=>'51 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'52 Section',
                 'slug'=>'52 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'53 Section',
                 'slug'=>'53 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'54 Section',
                 'slug'=>'54 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'55 Section',
                 'slug'=>'55 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'56 Section',
                 'slug'=>'56 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'57 Section',
                 'slug'=>'57 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'58 Section',
                 'slug'=>'58 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'59 Section',
                 'slug'=>'59 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'60 Section',
                 'slug'=>'60 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'61 Section',
                 'slug'=>'61 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'62 Section',
                 'slug'=>'62 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'63 Section',
                 'slug'=>'63 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'64 Section',
                 'slug'=>'64 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'65 Section',
                 'slug'=>'65 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'66 Section',
                 'slug'=>'66 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'67 Section',
                 'slug'=>'67 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'68 Section',
                 'slug'=>'68 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'69 Section',
                 'slug'=>'69 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'70 Section',
                 'slug'=>'70 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'71 Section',
                 'slug'=>'71 Sect',
                 'created_at'=> now(),
             ],
             [
                 'name'=>'72 Section',
                 'slug'=>'72 Sect',
                 'created_at'=> now(),
             ],
             */
        ];

        Section::insert($sections);
    }
}
