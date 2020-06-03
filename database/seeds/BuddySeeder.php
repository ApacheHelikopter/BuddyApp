<?php

use Illuminate\Database\Seeder;

class BuddySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buddy1 = new \App\Buddy();
        $buddy1->user_id = '1';
        $buddy1->firstname = 'Forsen';
        $buddy1->lastname = 'Baj';
        $buddy1->class = '3IMD';
        $buddy1->bio = 'Bestest Buddy';
        $buddy1->buddy_status = 'Searching';
        $buddy1->profile_picture = "mock.png";
        $buddy1->save();

        $buddy2 = new \App\Buddy();
        $buddy2->user_id = '2';
        $buddy2->firstname = 'John';
        $buddy2->lastname = 'Doe';
        $buddy2->class = '3IMD';
        $buddy2->bio = 'Bestest Buddy';
        $buddy2->buddy_status = 'Searching';
        $buddy2->profile_picture = "mock.png";
        $buddy2->save();

        $buddy3 = new \App\Buddy();
        $buddy3->user_id = '3';
        $buddy3->firstname = 'Steve';
        $buddy3->lastname = 'Jobs';
        $buddy3->class = '3IMD';
        $buddy3->bio = 'Bestest Buddy';
        $buddy3->buddy_status = 'Searching';
        $buddy3->profile_picture = "mock.png";
        $buddy3->save();
        // factory(\App\Buddy::class, 30)->create();
    }
}
