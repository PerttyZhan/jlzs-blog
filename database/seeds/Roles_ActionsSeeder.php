<?php

use Illuminate\Database\Seeder;
use App\Model\Role_Action;

class Roles_ActionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role_Action::create([
            'roles_id'=>1,
            'actions_id'=>1
        ]);
        Role_Action::create([
            'roles_id'=>1,
            'actions_id'=>2
        ]);
        Role_Action::create([
            'roles_id'=>1,
            'actions_id'=>3
        ]);
        Role_Action::create([
        'roles_id'=>1,
        'actions_id'=>4
    ]);
        Role_Action::create([
            'roles_id'=>1,
            'actions_id'=>5
        ]);
        Role_Action::create([
            'roles_id'=>2,
            'actions_id'=>1
        ]);
        Role_Action::create([
            'roles_id'=>2,
            'actions_id'=>2
        ]);
        Role_Action::create([
            'roles_id'=>2,
            'actions_id'=>3
        ]);
        Role_Action::create([
            'roles_id'=>2,
            'actions_id'=>4
        ]);
        Role_Action::create([
            'roles_id'=>3,
            'actions_id'=>4
        ]);


    }
}
