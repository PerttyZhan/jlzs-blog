<?php

use Illuminate\Database\Seeder;
use App\Model\Report;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Report::create([
            'name' => '张三',
            'headline' => '大',
            'title' => '小标题',
            'weight' =>'1',
            'report_content' => '11111',
            'status'=>'0',
            'sort_id' =>'1',
            'collection'=>'0',
            'user_id'=>1
        ]);

        Report::create(
            [
                'name' => '李四',
                'headline' => '很大',
                'title' => '小标题',
                'weight' =>'1',
                'report_content' => '11111',
                'status'=>'0',
                'sort_id' =>'2',
                'collection'=>'0',
                'user_id'=>1
            ]
        );
        Report::create(
            [
                'name' => '王五',
                'headline' => '超级大',
                'title' => '小标题',
                'weight' =>'1',
                'report_content' => '11111',
                'status'=>'0',
                'sort_id' =>'3',
                'collection'=>'0',
                'user_id'=>1
            ]
        );
    }
}
