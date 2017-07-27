<?php

use Illuminate\Database\Seeder;
use App\Model\Information;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Information::create([
            'name' => '张三',
            'headline' => '大',
            'title' => '小标题',
            'weight' =>'1',
            'information_content' => '11111',
            'status'=>'0',
            'sort_id' =>'1',
            'information_two_id'=>'0',
            'user_id'=>1
        ]);

        Information::create(
            [
                'name' => '李四',
                'headline' => '很大',
                'title' => '小标题',
                'weight' =>'1',
                'information_content' => '11111',
                'status'=>'0',
                'sort_id' =>'2',
                'information_two_id'=>'0',
                'user_id'=>1
            ]
        );
        Information::create(
            [
                'name' => '王五',
                'headline' => '超级大',
                'title' => '小标题',
                'weight' =>'1',
                'information_content' => '11111',
                'status'=>'0',
                'sort_id' =>'3',
                'information_two_id'=>'0',
                'user_id'=>1
            ]
        );
    }
}
