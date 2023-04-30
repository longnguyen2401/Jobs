<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('companies')->insert([
            'user_id' => 1,
            'name' => 'TESLA Vietnam',
            'address' => 'Địa chỉ 1',
            'about' => 'QUALITY SPEAKS FOR ITSELF Thành lập từ năm 2007 bởi các sáng lập viên là cựu du học sinh của chính phủ Úc, TESLA Vietnam là công ty hoạt động trong lĩnh vực CNTT với nòng cốt là các chuyên gia đầu ngành từ các tập đoàn công nghệ lớn của thế giới.',
            'technologies' => json_encode(array('PHP', 'Javascript')),            
            'people' => 100,
            'logo' => '/public/media/logo.png',
            'slogan' => 'QUALITY SPEAKS FOR ITSELF',
        ]);
    }
}
