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
        $student1 = new \App\User();
        $student1->email = 'pietersruben@hotmail.com';
        $student1->password = Hash::make('password');
        $student1->save();

        $student2 = new \App\User();
        $student2->email = 'johndoe@hotmail.com';
        $student2->password = Hash::make('password');
        $student2->save();

        $student3 = new \App\User();
        $student3->email = 'stevejobs@hotmail.com';
        $student3->password = Hash::make('password');
        $student3->save();

        // factory(\App\User::class, 30)->create();
    }
}
