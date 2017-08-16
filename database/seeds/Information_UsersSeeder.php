<?php

use Illuminate\Database\Seeder;
use App\Model\Information_Users;

class Information_UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Information_Users::create([
            'see_id'=>1,
            'user_id'=>1
        ]);
        Information_Users::create([
            'see_id'=>2,
            'user_id'=>1
        ]);
    }
}
