<?php

use Illuminate\Database\Seeder;

class EmployeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            [
                'nik' => '36090902930940293',
                'first_name'     => 'moh',
                'last_name'    => 'rahmatullah',
                'company_id' => '1',
                'email' => 'rahmat@email.com',
                'phone' => '083876854003',
                'address' => 'pandeglang'
            ]
        ]);
    }
}
