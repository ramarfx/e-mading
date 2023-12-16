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
        $guruRole = Role::create([
            'name' => 'guru',
        ]);
        $studentCouncilRole = Role::create([
            'name' => 'osis',
        ]);
        $studentRole = Role::create([
            'name' => 'student',
        ]);
        $ekskulRole = Role::create([
            'name' => 'ekskul',
        ]);

        // create users
        User::factory()->create([
            'name'    => 'Admin',
            'email'   => 'admin@gmail.com',
            'nis_nip' => '123456',
        ])->roles()->attach($adminRole);

        User::factory()->create([
            'name'    => 'rama',
            'email'   => 'rama@gmail.com',
            'nis_nip' => '3424',
        ])->roles()->attach($studentRole);

        User::factory()->create([
            'name'    => 'Riyan putra',
            'email'   => 'osis@gmail.com',
            'nis_nip' => '123414',
        ])->roles()->attach($studentCouncilRole);

        User::factory()->create([
            'name'    => 'pradipta arya',
            'email'   => 'ekskul@gmail.com',
            'nis_nip' => '2342',
        ])->roles()->attach($ekskulRole);

        User::factory()->create([
            'name' => 'veranika',
            'email' => 'guru@gmail.com',
            'nis_nip' => '3425',
        ])->roles()->attach($guruRole);
    }
}
