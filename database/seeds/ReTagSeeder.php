<?php

use Illuminate\Database\Seeder;
use App\Model\ReTag;

class ReTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ReTag::create([
            'name'=>'产品金融',
            'difference'=>'retag',
            'citations'=>'9'
        ]);
        ReTag::create([
            'name'=>'人工智能',
            'difference'=>'retag',
            'citations'=>'9'
        ]);
        ReTag::create([
            'name'=>'新零售',
            'difference'=>'retag',
            'citations'=>'9'
        ]);
        ReTag::create([
            'name'=>'消费升级',
            'difference'=>'retag',
            'citations'=>'9'
        ]);


    }
}
