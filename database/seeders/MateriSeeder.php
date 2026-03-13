<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Materi;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Materi::create([
            'mainmateri_id'=>1,
            'title'=>'Flutter Basic'
        ]);

        Materi::create([
            'mainmateri_id'=>1,
            'title'=>'React Native'
        ]);

        Materi::create([
            'mainmateri_id'=>1,
            'title'=>'Android Native'
        ]);

        Materi::create([
            'mainmateri_id'=>1,
            'title'=>'Mobile UI/UX'
        ]);

        Materi::create([
            'mainmateri_id'=>2,
            'title'=>'HTML'
        ]);

        Materi::create([
            'mainmateri_id'=>2,
            'title'=>'CSS'
        ]);

        Materi::create([
            'mainmateri_id'=>2,
            'title'=>'JavaScript'
        ]);

        Materi::create([
            'mainmateri_id'=>2,
            'title'=>'Laravel'
        ]);

        Materi::create([
            'mainmateri_id'=>3,
            'title'=>'Unity Basic'
        ]);

        Materi::create([
            'mainmateri_id'=>3,
            'title'=>'Game Programming'
        ]);
    }
}
