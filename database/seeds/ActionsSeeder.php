<?php

use Illuminate\Database\Seeder;
use App\Model\Action;

class ActionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Action::create([
            'actions_name'=>'添加权限'
        ]);
        Action::create([
            'actions_name'=>'删除权限'
        ]);
        Action::create([
            'actions_name'=>'修改权限'
        ]);
        Action::create([
            'actions_name'=>'查看权限'
        ]);
        Action::create([
            'actions_name'=>'修改管理员权限'
        ]);
    }
}
