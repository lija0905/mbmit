<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $table = 'language_options';

    public function run()
    {
        DB::table($this->table)->insert([
            'name' => 'Srpski',
            'code' => 'rs',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table($this->table)->insert([
            'name' => 'English',
            'code' => 'en',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table($this->table)->insert([
            'name' => 'Српски',
            'code' => 'pc', //ovo je pc na latinici, nije cirilica da bi se u kodu lakse gledalo
            'created_at' => now(),
            'updated_at' => now()
        ]);




    }
}
