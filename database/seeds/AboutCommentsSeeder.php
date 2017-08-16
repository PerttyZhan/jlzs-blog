<?php

use Illuminate\Database\Seeder;
use App\Model\About_Comments;

class AboutCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        About_Comments::create([
            'comment'=>'123123',
            'user_id'=>1,
            'comment_id'=>1
        ]);
        About_Comments::create([
            'comment'=>'123123',
            'user_id'=>1,
            'comment_id'=>1
        ]);
        About_Comments::create([
            'comment'=>'123123',
            'user_id'=>2,
            'comment_id'=>2
        ]);
    }
}
