<?php

use Illuminate\Database\Seeder;
use App\Model\Information_Intag;

class Information_InTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Information_Intag::create([
            'new_id'=>'1',
            'tag_id'=>1
        ]);
        Information_Intag::create([
            'new_id'=>'1',
            'tag_id'=>2
        ]);
        Information_Intag::create([
            'new_id'=>'1',
            'tag_id'=>3
        ]);
    }
}
