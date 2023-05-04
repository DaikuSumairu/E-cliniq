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
                'name' => 'Julian Timbers',
                'email' => 'jtimbers@apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '2018-27845',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Jose Mari Tanyag',
                'email' => 'jmtanyag@apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '2019-29475',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'George Carlos',
                'email' => 'gcarlos@apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '2016-38551',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Joseph Mandali',
                'email' => 'jmandali@apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '2017-36183',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Tenshou Makatako',
                'email' => 'tmakatako@apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '2016-28519',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Kenzo Janiko',
                'email' => 'kjaniko@apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '2018-17493',
                'department' => 'Computer Science',
            ],
            /*[
                'name' => 'Julian Timbers',
                'email' => 'jtimbers@apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Julian Timbers',
                'email' => 'jtimbers@apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Julian Timbers',
                'email' => 'jtimbers@apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Julian Timbers',
                'email' => 'jtimbers@apc.edu.ph',
                'role' => 1,
                'password' => bcrypt('Sample123456'),
                'school_id' => '',
                'department' => 'Computer Science',
            ],*/
        ];
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
