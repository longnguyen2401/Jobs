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
            [
                'company_id' => 1,
                'title' => 'Fullstack Developer (Up to 2000$)',
                'quantity' => 4,
                'description' => 'Tham gia các dự án triển khai sản phẩm của công ty (Magestore POS) cho khách hàng, thực hiện các yêu cầu mới chỉnh sửa và thêm tính năng sản phẩm theo yêu cầu của khách hàng
                Tham gia phát triển các sản phẩm mới của công ty (Retail Management System), Shopify apps
                Phối hợp với team phát triển và các bộ phận liên quan để đảm bảo project được thực hiện đúng yêu cầu, đảm bảo chất lượng và deadline
                Làm việc với tất cả các phần back-end, front-end, database của sản phẩm Magestore POS
                Tham gia vào quá trình phân tích và thiết kế hệ thống trong quá trình triển khai giải pháp cho khách hàng
                Nghiên cứu công nghệ, phát triển tính năng và tối ưu sản phẩm phục vụ số lượng người dùng lớn
                Các công việc khác theo yêu cầu',
                'max_salary' => 2000,            
                'level' => 'Junior|Middle',
                'type' => 'FullStack|Remote',
                'year' => 2,
                'skill' => 'PHP|Javascript|AWS',
                'active' => 1,
            ], [
                'company_id' => 2,
                'title' => 'Backend Developer (PHP/NestJS/AWS)',
                'quantity' => 5,
                'description' => 'At least 3 years of experience in developing web applications using NestJS or PHP
                At least 2 years of experience in constructing infrastructure using AWS
                Experience with ECS, EC2, Fargate, Lambda, S3, CloudFormation, CodePipeline, setup CI/CD, Docker
                Solid understanding of object-oriented programming
                Having experience working with MySQL or MongoDB/Redis
                Having experience working with GraphQL or RESTful API
                Knowledge of Git version control system
                Strong problem-solving and analytical skills, Design Pattern
                Good communication and teamwork skills
                Be able leading small size teams as a developer leader',
                'type' => 'FullStack|Remote',
                'max_salary' => 1700,            
                'level' => 'Senior',
                'year' => 3,
                'skill' => 'PHP|AWS',
                'active' => 1,
            ]]);
    }
}
