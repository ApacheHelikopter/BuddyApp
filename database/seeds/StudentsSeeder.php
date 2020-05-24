<?php

use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student1 = new \App\Student();
        $student1->firstname = 'Ruben';
        $student1->lastname = 'Pieters';
        $student1->bio = 'Best Buddy';
        $student1->profile_picture = "default.png";
        $student1->save();
    }
}
