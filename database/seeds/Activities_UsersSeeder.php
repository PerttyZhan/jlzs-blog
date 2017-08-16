<?php

use Illuminate\Database\Seeder;
use App\Model\Activities_Users;

class Activities_UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Activities_Users::create([
            'see_id'=>1,
            'user_id'=>1
        ]);
        Activities_Users::create([
            'see_id'=>2,
            'user_id'=>1
        ]);
    }
}
