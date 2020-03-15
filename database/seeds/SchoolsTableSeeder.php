<?php

use App\School;
use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = ['pro one', 'pro two'];

        foreach ($schools as $school) {

            School::create([
                'stage_id' => 1,
                'ar' => ['name' => $school, 'description' => $school . ' desc'],
                'en' => ['name' => $school, 'description' => $school . ' desc'],
                'purchase_price' => 100,
                'sale_price' => 150,
                'stock' => 100,
            ]);

        }//end of foreach

    }//end of run

}//end of seeder
