<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateFacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'jdcruz@student.apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
        ];
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
