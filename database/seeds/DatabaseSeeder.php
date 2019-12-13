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
        DB::table('accounts')->insert([
            'name'            => "Administrator",
            'password'        => bcrypt(sha1('admin')),
            'email'           => 'admin@admin.com'
        ]);
    }
}
