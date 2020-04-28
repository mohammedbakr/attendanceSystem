<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // الشئوون
        $user = User::create([
            'name' => 'Affairs',
            'type' => 'super',
            'email' => 'admin@app.com',
            'email_verified_at' => now(),
            'password' => bcrypt('111'),
            'remember_token' => str_random(10),
        ]);

        $user->attachRole('super_admin');

        // مدير المدرسة 1
        $user = User::create([
            'name' => 'School head',
            'type' => 'head master',
            'email' => 'head@app.com',
            'email_verified_at' => now(),
            'password' => bcrypt('111'),
            'remember_token' => str_random(10),
        ]);

        $user->attachRole('admin');

        // وكيل المدرسة 1
        $user = User::create([
            'name' => 'School Assistant',
            'type' => 'head assistant',
            'email' => 'assistant@app.com',
            'email_verified_at' => now(),
            'password' => bcrypt('111'),
            'remember_token' => str_random(10),
        ]);

        $user->attachRole('admin'); 

        // مدير المدرسة 2
        $user = User::create([
            'name' => 'School head 2',
            'type' => 'head master',
            'email' => 'head2@app.com',
            'email_verified_at' => now(),
            'password' => bcrypt('111'),
            'remember_token' => str_random(10),
        ]);       

        $user->attachRole('admin');

        // وكيل المدرسة 2
        $user = User::create([
            'name' => 'School Assistant 2',
            'type' => 'head assistant',
            'email' => 'assistant2@app.com',
            'email_verified_at' => now(),
            'password' => bcrypt('111'),
            'remember_token' => str_random(10),
        ]);

        $user->attachRole('admin');

        // مدير المدرسة 3
        $user = User::create([
            'name' => 'School head 3',
            'type' => 'head master',
            'email' => 'head3@app.com',
            'email_verified_at' => now(),
            'password' => bcrypt('111'),
            'remember_token' => str_random(10),
        ]);       

        $user->attachRole('admin');

        // وكيل المدرسة 3
        $user = User::create([
            'name' => 'School Assistant 3',
            'type' => 'head assistant',
            'email' => 'assistant3@app.com',
            'email_verified_at' => now(),
            'password' => bcrypt('111'),
            'remember_token' => str_random(10),
        ]);

        $user->attachRole('admin');

        // مدير المدرسة 4
        $user = User::create([
            'name' => 'School head 4',
            'type' => 'head master',
            'email' => 'head4@app.com',
            'email_verified_at' => now(),
            'password' => bcrypt('111'),
            'remember_token' => str_random(10),
        ]);       

        $user->attachRole('admin');

        // وكيل المدرسة 4
        $user = User::create([
            'name' => 'School Assistant 4',
            'type' => 'head assistant',
            'email' => 'assistant4@app.com',
            'email_verified_at' => now(),
            'password' => bcrypt('111'),
            'remember_token' => str_random(10),
        ]);

        $user->attachRole('admin');

        // مشرف الكلية
        $user = User::create([
            'name' => 'Faculty Supervisor',
            'type' => 'faculty supervisor',
            'email' => 'facultysupervisor@app.com',
            'email_verified_at' => now(),
            'password' => bcrypt('111'),
            'remember_token' => str_random(10),
        ]);

        $user->attachRole('admin');

        // الكنترول
        $user = User::create([
            'name' => 'Control',
            'type' => 'control',
            'email' => 'control@app.com',
            'email_verified_at' => now(),
            'password' => bcrypt('111'),
            'remember_token' => str_random(10),
        ]);

        $user->attachRole('admin');

    }//end of run

}//end of seeder
