<?php

namespace Database\Seeders;

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
        $this->call(RolesTableSeeder::class);
        $this->call(ClassLevelsTableSeeder::class);
        $this->call(AccountsTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
    }
}
