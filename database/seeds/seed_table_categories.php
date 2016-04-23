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
            'name' => 'sample',
            'active' => true
        ]);
    }
}
