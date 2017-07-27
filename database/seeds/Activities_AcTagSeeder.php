<?php

use Illuminate\Database\Seeder;
use App\Model\Activities_Actag;

class Activities_AcTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Activities_Actag::create([
            'activities_id'=>'1',
            'tag_id'=>1
        ]);
        Activities_Actag::create([
            'activities_id'=>'1',
            'tag_id'=>2
        ]);
        Activities_Actag::create([
            'activities_id'=>'1',
            'tag_id'=>3
        ]);
    }
}
