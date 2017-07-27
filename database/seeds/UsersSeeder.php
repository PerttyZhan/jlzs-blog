<?php

use Illuminate\Database\Seeder;
use App\Model\Users;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::create([
            'name' => '张三',
            'phone'=>123456789,
            'password'=>bcrypt('123456'),
        ]);
        Users::create([
            'name' => '李四',
            'phone'=>111111111,
            'password'=>bcrypt('123456'),
        ]);
    }
}
