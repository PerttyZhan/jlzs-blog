<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UsersSeeder::class);
        $this->call(AdminSeeder::class);

        $this->call(SortReportsSeeder::class);
        $this->call(SortActivitiesSeeder::class);
        $this->call(SortInformationSeeder::class);

        $this->call(ReportSeeder::class);
        $this->call(ActivitiesSeeder::class);
        $this->call(InformationSeeder::class);

        $this->call(ReportsCommentsSeeder::class);
        $this->call(ActivitiesCommentsSeeder::class);
        $this->call(InformationCommentsSeeder::class);

        $this->call(AcTagSeeder::class);
        $this->call(ReTagSeeder::class);
        $this->call(InTagSeeder::class);


        $this->call(Report_ReTagSeeder::class);
        $this->call(Activities_AcTagSeeder::class);
        $this->call(Information_InTagSeeder::class);


        $this->call(Aboutseeder::class);

    }
}
