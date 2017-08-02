<?php

use Illuminate\Database\Seeder;
use App\Model\AbTage;

class AbTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AbTage::create([
            'name'=>'创享家',
            'citations'=>'9'

        ]);
        AbTage::create([
            'name'=>'研习社',
            'citations'=>'9'
        ]);
        AbTage::create([
            'name'=>'势道术',
            'citations'=>'9'
        ]);
    }
}
