<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WelcomeSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('welcome_section')->insert([
            "naslov" => "Dobrodošli na sajt istraživačke grupe za multimodalno biomedicinsko inženjerstvo",
            "title"  => "Welcome to Research group for Multimodal Biomedical Engineering",
            "opis" => "Istraživačka grupa za multimodalno biomedicinsko inženjerstvo se bavi dizajniranjem prototipova uređaja koji omogućavaju prepoznavanje emocionalnog i kognitivnog stanja ispitanika na osnovu multisenzorskih merenja fizioloških signala u eksperimentalnim i realnim scenarijima i njihovu primenu u različite svrhe (neuromarketing, poligrafija, tretman dece sa razvojim poremećajima itd.). Takođe, istraživanja obuhvataju i unapređenje terapije i oporavka osoba sa senzorno-motornim oštećenjem primenom najsavremenijih hibridnih pristupa baziranih na Brain Computer Interface sistemima.",
            "description" => "The research group for multimodal Biomedical engineering is engaged in the design of device prototypes that enable recognition of the emotional and cognitive state of the subject based on multisensory measurements of physiological signals in experimental and real scenarios and their application for various purposes (neuromarketing, polygraphy, treatment of children with developmental disorders, etc.). Also, research includes the improvement of therapy and recovery of persons with sensory-motor impairment using the most modern hybrid approaches based on Brain Computer Interface systems.",
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
