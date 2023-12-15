<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Post::factory(20)->create();
        Post::create([
            'user_id'     => 1,
            'title'       => 'Event cipta puisi by Awaranasi',
            'description' => '
            Halo Sobat Literasi 👋🏼
            Awanarasi lagi ngadain event Cipta Puisi nih guys. Kalian bisa banget ikutin event ini.

            Temanya apa Kak?
            Puisi Tema : Sosok Pahlawan

            Siapa aja yang boleh ikut kak?
            Terbuka untuk umum yang guys.

            Deadline : 20 Desember 2023📌
            Syarat dan ketentuan lain bisa dilihat pada banner atau deskripsi grup. Atau boleh langsung bertanya pada PJ Event.

            ༺  Benefit
            Kategori Juara 1-3🍁 :
            ✨ Piala
            ✨ Sertifikat Cetak
            ✨ E-Sertifikat
            ✨ Buku Terbit Antologi
            ✨ Layout cantik
            ✨ Cover
            ✨ Hadiah Lainnya

            ༺  Benefit :
            Kategori Terbaik, Terunik, Favorit, dan Terpilih🍁
            ✨ Piala
            ✨ Sertifikat Cetak
            ✨ E-Sertifikat
            ✨ Buku Terbit Antologi
            ✨ Karya Dibukukan
            ✨ Layout cantik
            ✨ Cover
            ✨ Hadiah Lainnya

            Yakin gak mau ikut?  Banyak benefit yang kalian dapetin lohh 😍🤩.

            Mau ikut atau tanya-tanya dulu? Chat PJ Event.📲 wa.me/6285772624756

            Atau masuk grupnya💫
            https://chat.whatsapp.com/FGRIi2utWp37i9tJUIQ3Jc

            TUNGGU APALAGI AYO JOINNN‼',
            'category' => 'event',
            'priority_level' => 'biasa',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
