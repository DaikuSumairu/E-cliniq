<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            CreateUsersSeeder::class,
            CreateStudentSeeder::class,
            CreateFacultySeeder::class,
            InventoriesSeeder::class,
        ]);
    }
}
