<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admin')->insert([
            array(
                'name' => 'Ruhul',
                'username' => 'ruhul',
                'email' => 'ruhulrahman2233@gmail.com',
                'mobile' => '01638584622',
                'password' => md5('admin')
            ),
            array(
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'mobile' => '01638584622',
                'password' => md5('admin')
            )
        ]);
    }
}
