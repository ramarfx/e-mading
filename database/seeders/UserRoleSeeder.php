<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'admin',
        ]);
        $siswaRole = Role::create([
            'name' => 'siswa',
        ]);
        $ekskulRole = Role::create([
            'name' => 'ketua ekskul',
        ]);
        $osisRole = Role::create([
            'name' => 'osis',
        ]);
        $guruRole = Role::create([
            'name' => 'guru',
        ]);

        $adminUser = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);

        $adminUser->roles()->attach($adminRole);

        $userSiswa = User::factory()->create([
            'name' => 'rama',
            'email' => 'rama@gmail.com',
        ]);

        $userSiswa->roles()->attach($siswaRole);

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

        $userOsis->roles()->attach($osisRole);

        $userEkskul = User::factory()->create([
            'name' => 'ekskul',
            'email' => 'ekskul@gmail.com',
        ]);

        $userEkskul->siswa()->create([
            'nis' => '102193',
        ]);

        $userEkskul->roles()->attach($ekskulRole);

        $userGuru = User::factory()->create([
            'name' => 'guru',
            'email' => 'guru@gmail.com',
        ]);

        $userGuru->guru()->create([
            'nip' => '907576',
        ]);

        $userGuru->roles()->attach($guruRole);
    }
}
