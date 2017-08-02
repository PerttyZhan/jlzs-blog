<?php

use Illuminate\Database\Seeder;
use App\Model\Activities;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Activities::create([
            'name' => '王五',
            'headline' => '大',
            'title' => '小标题',
            'weight' =>'1',
            'active_content' => '11111',
            'status'=>'0',
            'sort_id' =>'1',
            'collection'=>'0',
            'user_id'=>1
        ]);
        Activities::create([
            'name' => '很大',
            'headline' => '创变中国行',
            'title' => '小标题',
            'weight' =>'2',
            'active_content' => '11111',
            'status'=>'0',
            'sort_id' =>'2',
            'collection'=>'0',
            'user_id'=>1
        ]);
        Activities::create([
            'name' => '王五',
            'headline' => '超级大',
            'title' => '小标题',
            'weight' =>'3',
            'active_content' => '11111',
            'status'=>'0',
            'sort_id' =>'3',
            'collection'=>'0',
            'user_id'=>1
        ]);
    }
}
