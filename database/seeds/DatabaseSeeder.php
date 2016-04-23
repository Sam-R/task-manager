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
        $this->call('seed_table_priorities');
        $this->call('seed_table_categories');
        $this->call('seed_table_statuses');
        $this->call('seed_table_users');
    }
}
