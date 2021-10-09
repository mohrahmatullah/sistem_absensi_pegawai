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
        DB::table('users')->insert([
            [
                'name'     => 'admin',
                'email'    => 'admin@grtech.com.my',
                'password' => bcrypt('password'),
            ]
        ]);

        DB::table('users')->insert([
            [
                'name'     => 'user',
                'email'    => 'user@grtech.com.my',
                'password' => bcrypt('password'),
            ]
        ]);
    }
}
