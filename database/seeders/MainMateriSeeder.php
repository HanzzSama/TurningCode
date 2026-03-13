<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MainMateri;

class MainMateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MainMateri::create([
            'title' => 'App Development',
            'icon' => 'bx-code-block',
            'description' => 'App Dev adalah developer yang bikin aplikasi, biasanya buat HP atau desktop. Mereka ngerancang fitur, tampilan, dan cara kerja aplikasi supaya user bisa pakai dengan gampang, entah itu buat chat, belajar, belanja, atau hal lainnya.',
        ]);

        MainMateri::create([
            'title' => 'Web Development',
            'icon' => 'bx-code-block',
            'description' => 'Web Dev itu orang yang bikin dan ngembangin website. Mulai dari tampilan yang keliatan di browser sampai sistem di belakang layar yang ngatur data. Pokoknya semua yang bikin website bisa jalan, interaktif, dan enak dipakai itu kerjaannya web developer.',
        ]);

        MainMateri::create([
            'title' => 'Game Development',
            'icon' => 'bx-code-block',
            'description' => 'Game Dev itu developer yang bikin game. Mulai dari gameplay, karakter, sistem game, sampai dunia di dalam game. Jadi semua yang bikin game bisa dimainkan dan seru itu hasil kerja para game developer.',
        ]);
    }
}
