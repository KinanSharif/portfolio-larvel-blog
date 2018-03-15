<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $user = App\User::create([

            'name' => 'Kinan Sharif',

            'email'=> 'kinan@gmail.com',

            'password' => bcrypt('123456'),

            'admin' => 1,

        ]);

        App\Profile::create([

            'user_id' => $user->id,

            'avatar' => 'uploads/avatars/admin1.png',

            'about' => "hello I'm the admin",

            'facebook' => 'facebook.com',

            'youtube' => 'youtube.com'

        ]);
    }
}
