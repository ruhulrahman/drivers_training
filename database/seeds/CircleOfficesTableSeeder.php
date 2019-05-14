<?php

use Illuminate\Database\Seeder;

class CircleOfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('circle_offices')->insert([
            array(
                'circle_name' => 'Dhaka Metro Circle-1',
                'circle_address' => 'Mirpur-13, Dhaka',
            )
        ]);
    }
}
