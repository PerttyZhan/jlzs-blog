<?php

use Illuminate\Database\Seeder;
use App\Model\About;
class Aboutseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        About::create([
            'title'=>'中国',
            'about_content'=>'111111',
        ]);
        About::create([
            'title'=>'美国',
            'about_content'=>'222222'
        ]);

    }
}
