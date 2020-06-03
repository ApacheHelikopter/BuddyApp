<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $student1 = new \App\User();
        // $student1->firstname = 'Ruben';
        // $student1->lastname = 'Pieters';
        // $student1->email = 'pietersruben@hotmail.com';
        // $student1->password = Hash::make('password');
        // $student1->bio = 'Bestest Buddy';
        // $student1->profile_picture = "default.png";
        // $student1->save();
        factory(\App\User::class, 30)->create();
    }
}
