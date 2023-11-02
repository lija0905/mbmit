<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicationsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publications_type')->insert([
            "type_name_rs" => "Časopis",
            "type_name_en" => "Journal",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('publications_type')->insert([
            "type_name_rs" => "Konferencijski rad",
            "type_name_en" => "Conference paper",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('publications_type')->insert([
            "type_name_rs" => "Poglavlje",
            "type_name_en" => "Book chapter",
            "created_at" => now(),
            "updated_at" => now()
        ]);

    }
}
