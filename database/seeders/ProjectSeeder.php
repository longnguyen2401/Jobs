<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('projects')->insert([  
            [
                'profile_user_id' => 1,
                'name' => 'Jobcy Technology Pvt.Ltd',
                'position' => 'Project Manager',
                'start' => Carbon::now(),
                'end' => Carbon::now(),
                'description' => 'There are many variations of passages of available, but the majority alteration in some form. As a highly skilled and successfull product development and design specialist with more than 4 Years of My experience.',
            ],
            ]
        );
    }
}
