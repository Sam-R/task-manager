<?php

use Illuminate\Database\Seeder;

class seed_table_users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'fred@example.com',
            'password' => 'test',
        ]);
    }
}
