<?php

use Illuminate\Database\Seeder;

class TanasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tanas')->insert([
            array(
                'tana_name' => 'Ramna',
                'dis_id' => '1',
            ),
            array(
                'tana_name' => 'Dhanmondi',
                'dis_id' => '1',
            ),
            array(
                'tana_name' => 'Satkhira',
                'dis_id' => '10',
            ),
            array(
                'tana_name' => 'Kalaroa',
                'dis_id' => '10',
            ),
        ]);
    }
}
