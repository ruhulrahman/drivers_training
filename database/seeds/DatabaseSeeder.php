<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            AdminTableSeeder::class,
            SuperAdminTableSeeder::class,
            CircleOfficesTableSeeder::class,
            DivisionsTableSeeder::class,
            DistrictsTableSeeder::class,
            TanasTableSeeder::class,
	    ]);
    }
}
