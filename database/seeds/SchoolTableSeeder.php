<?php

use App\School;
use Illuminate\Database\Seeder;


class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::create([

            'name' => 'school one'
<<<<<<< HEAD
           
=======
>>>>>>> 6f5b621042ea32ecedf49b4320feebf9b2e69c00

        ]);

        School::create([

            'name' => 'school two'

        ]);
    }
}
