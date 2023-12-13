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
        $studentRole = Role::create([
            'name' => 'student',
        ]);
        $ekskulRole = Role::create([
            'name' => 'ekskul',
        ]);
        $studentCouncilRole = Role::create([
            'name' => 'student_council',
        ]);
        $teacherRole = Role::create([
            'name' => 'teacher',
        ]);


        // create users
        $adminUser = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);
        $adminUser->roles()->attach($adminRole);

        $studentUser = User::factory()->create([
            'name' => 'rama',
            'email' => 'rama@gmail.com',
        ]);
        $studentUser->roles()->attach($studentRole);
        $studentUser->siswa()->create([
            'nis' => '123456',
        ]);

        $studentCouncilUser = User::factory()->create([
            'name' => 'osis',
            'email' => 'osis@gmail.com',
        ]);
        $studentCouncilUser->siswa()->create([
            'nis' => '102192',
        ]);
        $studentCouncilUser->roles()->attach($studentCouncilRole);


        $ekskulUser = User::factory()->create([
            'name' => 'ekskul',
            'email' => 'ekskul@gmail.com',
        ]);
        $ekskulUser->siswa()->create([
            'nis' => '102193',
        ]);
        $ekskulUser->roles()->attach($ekskulRole);


        $teacherUser = User::factory()->create([
            'name' => 'guru',
            'email' => 'guru@gmail.com',
        ]);
        $teacherUser->guru()->create([
            'nip' => '907576',
        ]);
        $teacherUser->roles()->attach($teacherRole);
    }
}
