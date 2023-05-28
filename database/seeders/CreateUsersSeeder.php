<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Clinic',
                'email' => 'apcdoctor@apc.edu.ph',
                'role' => 2,
                'password' => bcrypt('Sample123456'),
            ],
            [
                'id' => 2,
                'name' => 'Clinic',
                'email' => 'apcdentist@apc.edu.ph',
                'role' => 3,
                'password' => bcrypt('Sample123456'),
            ],
            [
                'id' => 3,
                'name' => 'Clinic',
                'email' => 'apcnurse@apc.edu.ph',
                'role' => 4,
                'password' => bcrypt('Sample123456'),
            ],
            [
                'id' => 4,
                'name' => 'Clinic',
                'email' => 'clinicadmin@apc.edu.ph',
                'role' => 5,
                'password' => bcrypt('Sample123456'),
            ],
        ];
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
