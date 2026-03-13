<?php

namespace Database\Seeders;

use App\Models\SubMateri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubMateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubMateri::insert([

            // HTML
            [
                'materi_id' => 1,
                'title' => 'Pengertian HTML',
                'content' => 'HTML adalah bahasa markup untuk membuat struktur halaman web.'
            ],
            [
                'materi_id' => 1,
                'title' => 'Struktur Dasar HTML',
                'content' => 'Struktur HTML terdiri dari html, head, dan body.'
            ],
            [
                'materi_id' => 1,
                'title' => 'Tag HTML',
                'content' => 'Tag HTML digunakan untuk membuat elemen pada halaman web.'
            ],
            [
                'materi_id' => 1,
                'title' => 'Atribut HTML',
                'content' => 'Atribut memberikan informasi tambahan pada elemen HTML.'
            ],
            [
                'materi_id' => 1,
                'title' => 'Heading dan Paragraph',
                'content' => 'Heading dan paragraph digunakan untuk membuat struktur teks.'
            ],

            // CSS
            [
                'materi_id' => 2,
                'title' => 'Pengertian CSS',
                'content' => 'CSS digunakan untuk mengatur tampilan halaman web.'
            ],
            [
                'materi_id' => 2,
                'title' => 'Selector CSS',
                'content' => 'Selector digunakan untuk memilih elemen HTML yang akan diberi style.'
            ],
            [
                'materi_id' => 2,
                'title' => 'Box Model',
                'content' => 'Box model terdiri dari margin, border, padding dan content.'
            ],
            [
                'materi_id' => 2,
                'title' => 'Flexbox',
                'content' => 'Flexbox digunakan untuk membuat layout yang fleksibel.'
            ],
            [
                'materi_id' => 2,
                'title' => 'Grid Layout',
                'content' => 'Grid layout memudahkan membuat layout dua dimensi.'
            ],

            // JavaScript
            [
                'materi_id' => 3,
                'title' => 'Pengertian JavaScript',
                'content' => 'JavaScript membuat halaman web menjadi interaktif.'
            ],
            [
                'materi_id' => 3,
                'title' => 'Variabel JavaScript',
                'content' => 'Variabel digunakan untuk menyimpan data.'
            ],
            [
                'materi_id' => 3,
                'title' => 'Function JavaScript',
                'content' => 'Function adalah blok kode yang dapat dipanggil kembali.'
            ],
            [
                'materi_id' => 3,
                'title' => 'DOM Manipulation',
                'content' => 'DOM digunakan untuk memanipulasi elemen HTML melalui JavaScript.'
            ],
            [
                'materi_id' => 3,
                'title' => 'Event Listener',
                'content' => 'Event listener digunakan untuk menangani aksi user.'
            ],

            // Flutter
            [
                'materi_id' => 4,
                'title' => 'Pengenalan Flutter',
                'content' => 'Flutter adalah framework untuk membuat aplikasi mobile.'
            ],
            [
                'materi_id' => 4,
                'title' => 'Instalasi Flutter',
                'content' => 'Instalasi Flutter dilakukan melalui SDK Flutter.'
            ],
            [
                'materi_id' => 4,
                'title' => 'Widget Flutter',
                'content' => 'Widget adalah komponen utama dalam Flutter.'
            ],
            [
                'materi_id' => 4,
                'title' => 'Layout Flutter',
                'content' => 'Layout Flutter menggunakan Row, Column dan Stack.'
            ],
            [
                'materi_id' => 4,
                'title' => 'Navigation Flutter',
                'content' => 'Navigation digunakan untuk berpindah antar halaman.'
            ],

        ]);
    }
}
