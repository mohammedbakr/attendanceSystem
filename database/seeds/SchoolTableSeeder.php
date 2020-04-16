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

        ]);

        School::create([

            'name' => 'school two'

        ]);
    }
}
