<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::insert([
        	['key' => 'WEB_TITLE','value' => 'Zona Aman Perempuan'],
            ['key' => 'WEB_LOGO','value' => 'logo.png'],
            ['key' => 'WEB_LOGO_LIGHT','value' => 'logo-light.png'],
            ['key' => 'WEB_FAVICON','value' => 'favicon.ico'],
        	['key' => 'HEADING_TITLE','value' => 'ZONA AMAN PEREMPUAN'],
        	['key' => 'SUBHEADING_TITLE', 'value' => 'HOTLINE PEREMPUAN'],
        	['key' => 'LANDING_BG_IMG', 'value' => 'landing-bg.png']
        ]);
    }
}
