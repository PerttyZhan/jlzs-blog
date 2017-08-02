<?php

use Illuminate\Database\Seeder;
use App\Model\InTag;

class InTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        InTag::create([
            'name'=>'产品金融',
            'citations'=>'9'
        ]);
        InTag::create([
            'name'=>'智慧物流',
            'citations'=>'9'
        ]);
        InTag::create([
            'name'=>'人工智能',
            'citations'=>'9'
        ]);
        InTag::create([
            'name'=>'其他',
            'citations'=>'9'
        ]);


    }
}
