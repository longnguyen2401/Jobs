<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('education')->insert([  
            [
                'profile_user_id' => 1,
                'school_name' => 'International University',
                'major' => 'BCA - Bachelor of Computer Applications',
                'start' => Carbon::now(),
                'end' => Carbon::now(),
            ],
            ]
        );
    }
}
