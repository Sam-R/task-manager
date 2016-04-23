<?php

use Illuminate\Database\Seeder;

class seed_table_priorities extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->insert([
            'name' => 'high',
            'order' => 10,
            'active' => true,
        ]);

        DB::table('priorities')->insert([
            'name' => 'medium',
            'order' => 20,
            'active' => true,
        ]);

        DB::table('priorities')->insert([
            'name' => 'low',
            'order' => 30,
            'active' => true,
        ]);
    }
}
