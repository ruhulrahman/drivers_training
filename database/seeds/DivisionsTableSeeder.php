<?php

use Illuminate\Database\Seeder;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->insert([
            array(
            	'div_name' => 'Dhaka',
            ),
            array(
            	'div_name' => 'Rajshahi',
            ),
            array(
            	'div_name' => 'Chittagong',
            ),
            array(
            	'div_name' => 'Rangpur',
            ),
            array(
            	'div_name' => 'Barisal',
            ),
            array(
            	'div_name' => 'Khulna',
            ),
            array(
            	'div_name' => 'Mymensing',
            ),
            array(
            	'div_name' => 'Sylhet',
            ),
        ]);
    }
}
