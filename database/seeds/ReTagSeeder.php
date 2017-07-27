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
            'name'=>'产品金融'
        ]);
        ReTag::create([
            'name'=>'人工智能'
        ]);
        ReTag::create([
            'name'=>'新零售'
        ]);
        ReTag::create([
            'name'=>'消费升级'
        ]);


    }
}
