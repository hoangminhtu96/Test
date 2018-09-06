<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'username' => 'nt1402z',
            'email' => 'nt1402z.@gmail.com',
            'password' => bcrypt('nt1402'),
            'level' =>1,
        ]);
    }
}
