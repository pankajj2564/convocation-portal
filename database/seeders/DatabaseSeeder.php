<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Roles
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $staffRole = Role::firstOrCreate(['name' => 'Staff']);

        // 2. Create Default Admin User
        $admin = User::firstOrCreate(
            ['email' => 'pankaj.j2564@cgcuniversity.in'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('Psp@convocation26'),
            ]
        );
        $admin->assignRole($adminRole);

        // 3. Create Default Staff User (Other User)
        $staff = User::firstOrCreate(
            ['email' => 'varun.j3754@cgcuniversity.in'],
            [
                'name' => 'Convocation Staff',
                'password' => Hash::make('password123'),
            ]
        );
        $staff->assignRole($staffRole);

        // 4. Create a Default Sample Student
        Student::firstOrCreate(
            ['roll_no' => 'ROLL101'],
            [
                'name' => 'Rahul Sharma',
                'email' => 'prince.j1836@cgcuniversity.in',
                'phone' => '9888441786',
                'degree' => 'B.Tech',
                'branch' => 'Computer Science',
                'passing_year' => '2026',
            ]
        );
    }
}
