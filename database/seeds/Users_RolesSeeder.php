<?php

use Illuminate\Database\Seeder;
use App\Model\User_Role;

class Users_RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User_Role::create([
            'users_id'=>1,
            'roles_id'=>1
        ]);
        User_Role::create([
            'users_id'=>2,
            'roles_id'=>2
        ]);
        User_Role::create([
            'users_id'=>3,
            'roles_id'=>1
        ]);
    }
}
