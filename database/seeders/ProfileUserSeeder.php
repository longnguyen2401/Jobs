<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('profile_users')->insert([  
            [
                'user_id' => 4,
                'job_title' => 'PHP Developer',
                'website' => 'https://www.w3schools.com/',
                'about' => 'Tôi là sinh viên vừa mới tốt nghiệp của ngành Kỹ thuật Hóa học trường Đại học Bách Khoa thành phố Hồ Chí Minh. Để đạt được tấm bằng kỹ sư loại giỏi của mình, tôi đã chăm chỉ và cố gắng từng ngày cũng như tích lũy kiến thức vững chắc về ngành Hóa. Trong quá trình học tập và thực tập tại một số công ty, tôi đã củng cố và nâng cao năng lực của mình trong việc nghiên cứu và vận hành các thiết bị máy móc. Hiện tại, tôi mong muốn ứng tuyển vào vị trí Kỹ sư Hóa chất của công ty, tôi tin rằng với kiến thức và khả năng của mình sẽ giúp công việc luôn được hoàn thành một cách xuất sắc cũng như sẽ phát triển được sự nghiệp của mình.',
                'avatar' => 'avt2.png',
                'address' => 'P.13 Tân Bình TP Hồ Chí Minh',
                'skill' => 'PHP|Java|AWS|Docker',
                'cv' => 'cv2.pdf',
            ],
            ]
        );
    }
}
