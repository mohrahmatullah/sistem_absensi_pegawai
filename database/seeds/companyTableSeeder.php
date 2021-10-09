<?php

use Illuminate\Database\Seeder;

class companyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name'     => 'Daridanke',
                'email'    => 'daridanke@email.com',
                'logo'      => 'Null',
                'website' => 'https://daridanke.com'
            ]
        ]);
    }
}
