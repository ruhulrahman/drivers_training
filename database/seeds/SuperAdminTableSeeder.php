<?php

use Illuminate\Database\Seeder;

class SuperAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('super_admin')->insert([
            array(
                'name' => 'Ruhul',
                'username' => 'ruhul',
                'email' => 'ruhulrahman2233@gmail.com',
                'mobile' => '01638584622',
                'password' => md5('admin')
            ),
            array(
                'name' => 'Super Admin',
                'username' => 'superadmin',
                'email' => 'suepradmin@gmail.com',
                'mobile' => '01638584622',
                'password' => md5('superadmin')
            )
        ]);
    }
}
