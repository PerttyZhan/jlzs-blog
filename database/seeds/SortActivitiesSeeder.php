<?php

use Illuminate\Database\Seeder;
use App\Model\Sort_Activities;

class SortActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Sort_Activities::create([
            'sort'=>'创变中国行'
        ]);
        Sort_Activities::create([
            'sort'=>'产融研习社'
        ]);
        Sort_Activities::create([
            'sort'=>'青你来了'
        ]);
    }
}
