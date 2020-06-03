<?php

use Illuminate\Database\Seeder;

class InterestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interest1 = new \App\Interest();
        $interest1->interest = 'Development';
        $interest1->save();

        $interest2 = new \App\Interest();
        $interest2->interest = 'Design';
        $interest2->save();

        $interest3 = new \App\Interest();
        $interest3->interest = 'Illustrator';
        $interest3->save();

        $interest4 = new \App\Interest();
        $interest4->interest = 'Photoshop';
        $interest4->save();

        $interest5 = new \App\Interest();
        $interest5->interest = 'Sports';
        $interest5->save();

        $interest6 = new \App\Interest();
        $interest6->interest = 'Gaming';
        $interest6->save();

        $interest7 = new \App\Interest();
        $interest7->interest = 'UX/UI';
        $interest7->save();

        $interest8 = new \App\Interest();
        $interest8->interest = 'Music';
        $interest8->save();

        $interest9 = new \App\Interest();
        $interest9->interest = 'Movies';
        $interest9->save();

        $interest10 = new \App\Interest();
        $interest10->interest = 'Photography';
        $interest10->save();

        $interest11 = new \App\Interest();
        $interest11->interest = 'Marketing';
        $interest11->save();

        $interest12 = new \App\Interest();
        $interest12->interest = 'Television';
        $interest12->save();

        $interest13 = new \App\Interest();
        $interest13->interest = 'Reading';
        $interest13->save();

        $interest14 = new \App\Interest();
        $interest14->interest = 'Netflix';
        $interest14->save();

        $interest15 = new \App\Interest();
        $interest15->interest = 'Youtube';
        $interest15->save();

        $interest16 = new \App\Interest();
        $interest16->interest = 'Animals';
        $interest16->save();

        $interest17 = new \App\Interest();
        $interest17->interest = 'Traveling';
        $interest17->save();

        $interest18 = new \App\Interest();
        $interest18->interest = 'Technology';
        $interest18->save();

        $interest19 = new \App\Interest();
        $interest19->interest = 'Laravel';
        $interest19->save();

        $interest20 = new \App\Interest();
        $interest20->interest = 'PHP';
        $interest20->save();

        $interest21 = new \App\Interest();
        $interest21->interest = 'Javascript';
        $interest21->save();

        $interest22 = new \App\Interest();
        $interest22->interest = 'React';
        $interest22->save();

        $interest23 = new \App\Interest();
        $interest23->interest = 'Football';
        $interest23->save();
    }
}
