<?php

use Illuminate\Database\Seeder;
use App\Model\Report_Retag;

class Report_ReTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Report_Retag::create([
            'new_id'=>'1',
            'tag_id'=>1
        ]);
        Report_Retag::create([
            'new_id'=>'1',
            'tag_id'=>2
        ]);
        Report_Retag::create([
            'new_id'=>'1',
            'tag_id'=>3
        ]);
        Report_Retag::create([
            'new_id'=>'1',
            'tag_id'=>4
        ]);

    }
}
