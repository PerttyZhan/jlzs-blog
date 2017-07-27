<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Model\Admin::create([
            'username' => 'admin',
            'password' => bcrypt('123456'),
        ]);
    }
}
