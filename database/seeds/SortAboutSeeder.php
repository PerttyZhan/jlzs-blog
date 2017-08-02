<?php

use Illuminate\Database\Seeder;
use App\Model\Sort_About;
class SortAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Sort_About::create([
            'sort'=>'人工智能',
        ]);

        Sort_About::create([
            'sort'=>'大健康',
        ]);

        Sort_About::create([
            'sort'=>'节能环保',
        ]);

    }
}
