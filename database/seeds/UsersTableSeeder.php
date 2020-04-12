<?php

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
        $user = \App\User::create([
            'name' => 'superadmin',
            'email' => 'admin@app.com',
            'password' => bcrypt('111'),
        ]);

        $user->attachRole('super_admin');

        $user = \App\User::create([
            'name' => 'schoolhead1',
            'email' => 'head1@app.com',
            'password' => bcrypt('111'),
        ]);

        $user->attachRole('admin');

        $user = \App\User::create([
            'name' => 'schoolhead2',
            'email' => 'head2@app.com',
            'password' => bcrypt('111'),
        ]);

        $user->attachRole('admin');

    }//end of run

}//end of seeder
