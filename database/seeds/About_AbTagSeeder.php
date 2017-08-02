<?php

use Illuminate\Database\Seeder;
use App\Model\About_Abtag;

class About_AbTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        About_Abtag::create([
            'about_id'=>'1',
            'tag_id'=>1
        ]);
        About_Abtag::create([
            'about_id'=>'1',
            'tag_id'=>2
        ]);
        About_Abtag::create([
            'about_id'=>'1',
            'tag_id'=>3
        ]);
    }
}
