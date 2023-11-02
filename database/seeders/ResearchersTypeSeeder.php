<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResearchersTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('researchers_type')->insert([
            "type_name" => "Junior",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('researchers_type')->insert([
            "type_name" => "Senior",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('researchers_type')->insert([
            "type_name" => "Eksterni",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('researchers_type')->insert([
            "type_name" => "Alumni",
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
