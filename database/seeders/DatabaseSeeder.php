<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        DB::table('user_roles')->insert([
            ['name' => 'Administrator','status' => 1],
            ['name' => 'Author','status' => 1],
            ['name' => 'Contributor','status' => 1],
            ['name' => 'Editor','status' => 1],
        ]);
    }
}
