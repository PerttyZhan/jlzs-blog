<?php

use Illuminate\Database\Seeder;
use App\Model\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create(
            [
                'role_name'=>'超级管理员',
            ]
        );
     Role::create(
         [
          'role_name'=>'游客',
         ]
     );
    }
}
