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
        // students for school 1
        factory(Student::class, 3)->create([
            'school_id' => 1,
            'major' => 'primary3'
        ]);

        factory(Student::class, 3)->create([
            'school_id' => 1,
            'major' => 'postgraduate'
        ]);

        factory(Student::class, 3)->create([
            'school_id' => 1,
            'major' => 'general4'
        ]);

        // students for school 2
        factory(Student::class, 5)->create([
            'school_id' => 2,
            'major' => 'diploma'
        ]);

        factory(Student::class, 5)->create([
            'school_id' => 2,
            'major' => 'primary3'
        ]);

        // students for school 3
        factory(Student::class, 3)->create([
            'school_id' => 3,
            'major' => 'general4'
        ]);

        // not enrolled students
        factory(Student::class, 6)->create([
            'major' => 'kg1'
        ]);

        factory(Student::class, 5)->create([
            'major' => 'diploma'
        ]);

        factory(Student::class, 5)->create([
            'major' => 'primary4'
        ]);

        factory(Student::class, 5)->create([
            'major' => 'kg4'
        ]);
    }
}
