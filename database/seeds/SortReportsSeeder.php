<?php

use Illuminate\Database\Seeder;
use App\Model\Sort_Report;

class SortReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Sort_Report::create([
            'sort'=>'人物',
        ]);

        Sort_Report::create([
            'sort'=>'接力者说',
        ]);

        Sort_Report::create([
            'sort'=>'新势力',
        ]);

    }
}
