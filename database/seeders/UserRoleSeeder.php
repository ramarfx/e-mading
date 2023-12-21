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
        ])->roles()->attach($adminRole);

        User::factory()->create([
            'name'    => 'guru',
            'email'   => 'guru@gmail.com',
        ])->roles()->attach($guruRole);

        User::factory()->create([
            'name'    => 'osis',
            'email'   => 'osis@gmail.com',
        ])->roles()->attach($osisRole);

        User::factory()->create([
            'name'    => 'basket',
            'email'   => 'basket@gmail.com',
        ])->roles()->attach($ekskulRole);

        User::factory()->create([
            'name'    => 'rama',
            'email'   => 'rama@gmail.com',
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
