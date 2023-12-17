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
        $osisRole = Role::create([
            'name' => 'osis',
        ]);
        $siswaRole = Role::create([
            'name' => 'siswa',
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
            'name'    => 'guru',
            'email'   => 'guru@gmail.com',
            'nis_nip' => '2222',
        ])->roles()->attach($guruRole);

        User::factory()->create([
            'name'    => 'osis',
            'email'   => 'osis@gmail.com',
            'nis_nip' => '3333',
        ])->roles()->attach($osisRole);

        User::factory()->create([
            'name'    => 'basket',
            'email'   => 'basket@gmail.com',
            'nis_nip' => '4444',
        ])->roles()->attach($ekskulRole);

        User::factory()->create([
            'name'    => 'rama',
            'email'   => 'rama@gmail.com',
            'nis_nip' => '5555',
        ])->roles()->attach($siswaRole);

        foreach (User::factory(5)->create() as $user) {
            $user->roles()->attach($guruRole);
        }
        foreach (User::factory(10)->create() as $user) {
            $user->roles()->attach($osisRole);
        }
        foreach (User::factory(10)->create() as $user) {
            $user->roles()->attach($ekskulRole);
        }
        foreach (User::factory(15)->create() as $user) {
            $user->roles()->attach($siswaRole);
        }
    }
}
