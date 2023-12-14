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
            'name'    => 'Admin',
            'email'   => 'admin@gmail.com',
            'nis_nip' => '123456',
        ]);
        $adminUser->roles()->attach($adminRole);

        $studentUser = User::factory()->create([
            'name'    => 'rama',
            'email'   => 'rama@gmail.com',
            'nis_nip' => '3424',
        ]);
        $studentUser->roles()->attach($studentRole);

        $studentCouncilUser = User::factory()->create([
            'name'    => 'osis',
            'email'   => 'osis@gmail.com',
            'nis_nip' => '123414',
        ]);
        $studentCouncilUser->roles()->attach($studentCouncilRole);


        $ekskulUser = User::factory()->create([
            'name'    => 'ekskul',
            'email'   => 'ekskul@gmail.com',
            'nis_nip' => '2342',
        ]);
        $ekskulUser->roles()->attach($ekskulRole);


        $teacherUser = User::factory()->create([
            'name' => 'guru',
            'email' => 'guru@gmail.com',
            'nis_nip' => '3425',
        ]);
        $teacherUser->roles()->attach($teacherRole);
    }
}
