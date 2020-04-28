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
        // school 1
        $school = School::create([
            'name' => 'School One'
        ]);

        $school->users()->attach(2, ['school_id' => $school->id]);
        $school->users()->attach(3, ['school_id' => $school->id]);

        // school 2
        $school = School::create([
            'name' => 'School Two'
        ]);

        $school->users()->attach(4, ['school_id' => $school->id]);
        $school->users()->attach(5, ['school_id' => $school->id]);

        // school 3
        $school = School::create([
            'name' => 'School Three'
        ]);

        $school->users()->attach(6, ['school_id' => $school->id]);
        $school->users()->attach(7, ['school_id' => $school->id]);

        // school 4
        $school = School::create([
            'name' => 'School Four'
        ]);

        $school->users()->attach(8, ['school_id' => $school->id]);
        $school->users()->attach(9, ['school_id' => $school->id]);
    }
}
