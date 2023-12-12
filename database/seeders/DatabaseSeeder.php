<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);

        $userSiswa = User::factory()->create([
            'name' => 'rama',
            'email' => 'rama@gmail.com',
        ]);

        $userSiswa->siswa()->create([
            'nis' => '123456',
        ]);

        $userOsis = User::factory()->create([
            'name' => 'osis',
            'email' => 'osis@gmail.com',
        ]);

        $userOsis->siswa()->create([
            'nis' => '102192',
        ]);

        $userEkskul = User::factory()->create([
            'name' => 'ekskul',
            'email' => 'ekskul@gmail.com',
        ]);

        $userEkskul->siswa()->create([
            'nis' => '102193',
        ]);

        $userGuru = User::factory()->create([
            'name' => 'guru',
            'email' => 'guru@gmail.com',
        ]);

        $userGuru->guru()->create([
            'nip' => '907576',
        ]);

        $userOsis->posts()->create([
            'title' => fake('id_ID')->words(5, true),
            'description' => fake('id_ID')->sentence(),
            'category' => 'event',
            'priority_level' => 'biasa',
        ]);
    }
}
