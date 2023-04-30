<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('jobs')->insert([
            'company_id' => 1,
            'title' => 'Junior PHP Developer - Fulltime',
            'description' => 'Description',
            'min_salary' => 700,
            'max_salary' => 1000,            
            'level' => 'Junior',
            'year' => 2,
            'skill' => 'PHP|Javascript',
            'active' => 1,
        ]);
    }
}
