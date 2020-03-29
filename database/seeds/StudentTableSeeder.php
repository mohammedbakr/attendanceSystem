<?php

use App\Student;
use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([

            'name' => 'ahmed',
            'email' => 'ahmed@app.com',
            'password' => bcrypt('111'),
            'major' => 'kg',
            'stage' => '1',

        ]);

        Student::create([

            'name' => 'nader',
            'email' => 'nader@app.com',
            'password' => bcrypt('111'),
            'major' => 'primary',
            'stage' => '3',
            'school_id' => '1'

        ]);
    }
}
