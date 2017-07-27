<?php

use Illuminate\Database\Seeder;
use App\Model\Information_Comment;

class InformationCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Information_Comment::create([
            'comment'=>'123123',
            'user_id'=>1,
            'information_id'=>1
        ]);
        Information_Comment::create([
            'comment'=>'123123',
            'user_id'=>1,
            'information_id'=>1
        ]);
        Information_Comment::create([
            'comment'=>'123123',
            'user_id'=>2,
            'information_id'=>2
        ]);
    }
}
