<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([   
            [
                'name' => 'bsscompany',
                'email' => 'bssuser@gmail.com',
                'password' => \Hash::make('123123A@'),
                'type' => 2,
            ],
            [
                'name' => 'vitalify',
                'email' => 'vitalify@gmail.com',
                'password' => \Hash::make('123123A@'),
                'type' => 2,
            ], [
                'name' => 'admin1',
                'email' => 'admin1@gmail.com',
                'password' => \Hash::make('123123A@'),
                'type' => 3,
            ], [
                'name' => 'Trần Quốc Tuấn',
                'email' => 'tuantq@gmail.com',
                'password' => \Hash::make('123123A@'),
                'type' => 1,
            ],
            ]
        );
    }
}
