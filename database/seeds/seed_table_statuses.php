<?php

use Illuminate\Database\Seeder;

class seed_table_statuses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name' => 'backlog',
            'active' => true,
        ]);

        DB::table('statuses')->insert([
            'name' => 'to-do',
            'active' => true,
        ]);

        DB::table('statuses')->insert([
            'name' => 'in-progress',
            'active' => true,
        ]);

        DB::table('statuses')->insert([
            'name' => 'done',
            'active' => true,
        ]);
    }
}
