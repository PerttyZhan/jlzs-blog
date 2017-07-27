<?php

use Illuminate\Database\Seeder;
use App\Model\Activities_Comments;

class ActivitiesCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Activities_Comments::create([
            'comment'=>'123123',
            'user_id'=>1,
            'activities_id'=>1
        ]);
        Activities_Comments::create([
            'comment'=>'123123',
            'user_id'=>1,
            'activities_id'=>1
        ]);
        Activities_Comments::create([
            'comment'=>'123123',
            'user_id'=>2,
            'activities_id'=>2
        ]);
    }
}
