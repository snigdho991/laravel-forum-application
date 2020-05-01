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
        App\User::create([
        	'name'     => 'admin',
        	'password' => bcrypt('123'),
        	'email'    => 'admin@forum.com',
        	'admin'    => 1,
        	'avatar'   => asset('avatars/avatar.png')
        ]);

        App\User::create([
            'name'     => 'Argho',
            'password' => bcrypt('123'),
            'email'    => 'argho@bdforum.com',
            'avatar'   => asset('avatars/avatar.png')
        ]);
    }
}
