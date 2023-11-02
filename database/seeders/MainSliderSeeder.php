<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_slider')->insert([
            "naslov" => "Slide 1",
            "title"  => "Slide 1",
            "opis" => "Lorem ipsum dolor sit amet",
            "description" => "Lorem ipsum dolor sit amet",
            "photo" => "slide1.jpg",
            'link' => "https://etf.bg.ac.rs",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('main_slider')->insert([
            "naslov" => "Slide 2",
            "title"  => "Slide 2",
            "opis" => "Lorem ipsum dolor sit amet",
            "description" => "Lorem ipsum dolor sit amet",
            "photo" => "slide2.jpg",
            'link' => "https://etf.bg.ac.rs",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('main_slider')->insert([
            "naslov" => "Slide 3",
            "title"  => "Slide 3",
            "opis" => "Lorem ipsum dolor sit amet",
            "description" => "Lorem ipsum dolor sit amet",
            "photo" => "test.jpg",
            'link' => "https://etf.bg.ac.rs",
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
