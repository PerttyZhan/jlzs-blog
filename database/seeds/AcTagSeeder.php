<?php

use Illuminate\Database\Seeder;
use App\Model\AcTage;

class AcTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AcTage::create([
            'name'=>'创享家',
            'difference'=>'actag',
            'citations'=>'9'

        ]);
        AcTage::create([
            'name'=>'研习社',
            'difference'=>'actag',
            'citations'=>'9'
        ]);
        AcTage::create([
            'name'=>'势道术',
            'difference'=>'actag',
            'citations'=>'9'
        ]);
    }
}
