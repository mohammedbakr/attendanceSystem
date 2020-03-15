<?php

use App\Stage;
use Illuminate\Database\Seeder;

class StagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $stages = ['cat one', 'cat two', 'cat three'];

        foreach ($stages as $stage) {

            Stage::create([
                'ar' => ['name' => $stage],
                'en' => ['name' => $stage],
            ]);

        }//end of foreach

    }//end of run

}//end of seeder
