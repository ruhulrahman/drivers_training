<?php

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert([
            array(
            	'dis_name' => 'Dhaka',
            	'div_id' => '1',
            ),
            array(
            	'dis_name' => 'Narayangonj',
            	'div_id' => '1',
            ),
            array(
            	'dis_name' => 'Gazipur',
            	'div_id' => '1',
            ),
            array(
            	'dis_name' => 'Tangail',
            	'div_id' => '1',
            ),
            array(
            	'dis_name' => 'Kishoregonj',
            	'div_id' => '1',
            ),
            array(
            	'dis_name' => 'Narsingdi',
            	'div_id' => '1',
            ),
            array(
            	'dis_name' => 'Gopalgonj',
            	'div_id' => '1',
            ),
            array(
            	'dis_name' => 'Faridpur',
            	'div_id' => '1',
            ),
            array(
            	'dis_name' => 'Jessore',
            	'div_id' => '6',
            ),
            array(
            	'dis_name' => 'Satkhira',
            	'div_id' => '6',
            ),
        ]);
    }
}
