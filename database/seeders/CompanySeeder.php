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
            [
                'user_id' => 1,
                'name' => 'BSS Group',
                'address' => 'Tầng 14, 16, 18 & 19, Viwaseen Tower, số 48 Tố Hữu, Phường Trung Văn, Quận Nam Từ Liêm, Thành phố Hà Nội',
                'about' => 'BSS Group - Globally trusted partner for full service ecommerce solutions Since 2012, BSS has provided a wide range of products and services on multiple platforms, including Magento, Shopify, BigCommerce, and Shopware,... In 2022, we are thrilled to have Magestore and Simicart join the ecosystem to diversify our offerings to customers. From our humble beginnings with only 5 key members in our first office, BSS Group has now expanded to 300 members - including Ecommerce Solution Specialists, Certified Developers, PMP certified Project Managers, highly qualified Testers, and Marketers. To become a trusted full-service solution provider for multiple eCommerce platforms on a global scale, we are eager to find out the next talented generation to join us. We pride ourselves on: ',
                'technologies' => json_encode(array('PHP', 'Javascript', 'AWS')),            
                'people' => 100,
                'logo' => 'bss-logo.png',
                'slogan' => 'BSS Group - Globally trusted partner for full service ecommerce solutions',
            ],
            [
                'user_id' => 2,
                'name' => 'VITALIFY ASIA ( Công ty TNHH Vitalify Á Châu)',
                'address' => '224A-224B Dien Bien Phu, Phường Võ Thị Sáu, Quận 3, Thành phố Hồ Chí Minh',
                'about' => 'Vitalify Asia is a Japan-based technology company specialized in developing product (mobile/web) with partners and AI own product.',
                'technologies' => json_encode(array('PHP', 'AWS')),            
                'people' => 450,
                'logo' => 'vitalify-asia-logo.jpg',
                'slogan' => '',
            ]]);
    }
}
