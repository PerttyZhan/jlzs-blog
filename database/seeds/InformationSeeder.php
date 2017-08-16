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
            'content' => '11111',
            'status'=>'1',
            'sort_id' =>'1',
            'collection'=>'0',
            'user_id'=>1
        ]);

        Information::create(
            [
                'name' => '李四',
                'headline' => '很大',
                'title' => '小标题',
                'weight' =>'1',
                'content' => '11111',
                'status'=>'1',
                'sort_id' =>'2',
                'collection'=>'0',
                'user_id'=>1
            ]
        );
        Information::create(
            [
                'name' => '王五',
                'headline' => '超级大',
                'title' => '小标题',
                'weight' =>'1',
                'content' => '11111',
                'status'=>'1',
                'sort_id' =>'3',
                'collection'=>'0',
                'user_id'=>1
            ]
        );
        Information::create(
            [
                'name' => '天台',
                'headline' => '最大大',
                'title' => '小标题',
                'weight' =>'1',
                'content' => '11111',
                'status'=>'1',
                'sort_id' =>'1',
                'collection'=>'0',
                'user_id'=>1
            ]
        );
    }
}
