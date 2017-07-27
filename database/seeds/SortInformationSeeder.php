<?php

use Illuminate\Database\Seeder;
use App\Model\Sort_Information;

class SortInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Sort_Information::create([
            'sort'=>'人工智能',
        ]);

        Sort_Information::create([
            'sort'=>'大健康',
        ]);

        Sort_Information::create([
            'sort'=>'节能环保',
        ]);

    }
}
