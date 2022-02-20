<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'logo' => 'images/setting/2021111663103193630.png',
            'site_name' => 'منصة بصمه',
            'phone' => '8484858845855',
            'email' => 'info@eggs-plus.com',
            'location' => 'مول الصفوة الدور الثاني',
            'whatsapp' => '01095414200',
            'description' => 'small description about application',
            'copyright' => 'جميع الحقوق محفوظة منصة بصمه، تنفيذ و تطوير بواسطة',
            'location_url' => 'http://www.google.map.com',
        ];


        Setting::setMany($data);
    }
}
