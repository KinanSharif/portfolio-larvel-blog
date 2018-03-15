<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             App\Setting::create([

            'site_name' => "Laravel's blog",

            'address'=> 'India, Pune',

            'contact_number' => '8473635463',

            'contact_email' => 'info@laravel.com',

        ]);
    }
}
