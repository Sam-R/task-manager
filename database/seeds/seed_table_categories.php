<?php

use Illuminate\Database\Seeder;

class seed_table_categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'frontend',
            'active' => true
        ]);

        DB::table('categories')->insert([
            'name' => 'backend',
            'active' => true
        ]);

        DB::table('categories')->insert([
            'name' => 'database',
            'active' => true
        ]);

        DB::table('categories')->insert([
            'name' => 'support',
            'active' => true
        ]);

        DB::table('categories')->insert([
            'name' => 'administration',
            'active' => true
        ]);
    }
}
