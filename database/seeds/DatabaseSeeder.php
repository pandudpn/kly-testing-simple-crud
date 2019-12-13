<?php

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
        DB::table('users')->insert([
            'name'          => 'Administrator',
            'username'      => 'admin',
            'password'      => bcrypt(sha1('adminadmin')),
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
    }
}
