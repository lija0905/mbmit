<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'vasilijadev@gmail.com',
            'password'=> Hash::make('password'),
            'role_id' => '1',
            'email_verified_at'=> now(),
            'created_at'=> now(),
            'updated_at' => now()
        ]);
    }
}
