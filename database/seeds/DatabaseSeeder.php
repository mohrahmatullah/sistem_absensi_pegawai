<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(EmployeTableSeeder::class);
        $this->call(companyTableSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(RolesUserSeeder::class);
    }
}
