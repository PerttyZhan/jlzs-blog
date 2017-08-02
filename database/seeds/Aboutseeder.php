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
            'name' => '王五',
            'headline' => '大了吗',
            'title' => '小标题',
            'weight' =>'1',
            'about_content' => '11111',
            'status'=>'0',
            'sort_id' =>'1',
            'collection'=>'0',
            'user_id'=>1
        ]);
        About::create([
            'name' => '很大',
            'headline' => '创变中国行',
            'title' => '小标题',
            'weight' =>'2',
            'about_content' => '11111',
            'status'=>'0',
            'sort_id' =>'2',
            'collection'=>'0',
            'user_id'=>1
        ]);
        About::create([
            'name' => '王五',
            'headline' => '超级大',
            'title' => '小标题',
            'weight' =>'3',
            'about_content' => '11111',
            'status'=>'0',
            'sort_id' =>'3',
            'collection'=>'0',
            'user_id'=>1
        ]);

    }
}
