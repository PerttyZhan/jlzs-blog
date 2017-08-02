<?php

use Illuminate\Database\Seeder;
use App\Model\Report_Users;

class Report_UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Report_Users::create([
          'report_id'=>1,
          'user_id'=>1
      ]);
        Report_Users::create([
            'report_id'=>2,
            'user_id'=>1
        ]);

    }
}
