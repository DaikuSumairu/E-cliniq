<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Record;
use App\Models\User;

class CreateRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            [
                'user_id' => 5,
                'birth_date' => Carbon::parse('2005-01-15'),
                'age' => 18,
                'sex' => 'Male',
                'civil_status' => 'Single',
                'address' => '51 Bonifacio Street, Quezon City',
                'mobile_number' => '0974-923-4570',
                'contact_person' => 'Jane Doe',
                'contact_person_number' => '0998-765-4321',
            ],
            [
                'user_id' => 6,
                'birth_date' => Carbon::parse('2004-03-15'),
                'age' => 17,
                'sex' => 'Female',
                'civil_status' => 'Single',
                'address' => '2772 Roxas Boulevard, Pasay City',
                'mobile_number' => '0927-729-4643',
                'contact_person' => 'Sherwin Parker',
                'contact_person_number' => '0987-654-321',
            ],
            [
                'user_id' => 7,
                'birth_date' => Carbon::parse('1990-01-01'),
                'age' => 33,
                'sex' => 'Male',
                'civil_status' => 'Single',
                'address' => '123 Main Street, City, Country',
                'mobile_number' => '0941-215-7765',
                'contact_person' => 'John Doe',
                'contact_person_number' => '0987-654-3210',
            ],
            [
                'user_id' => 8,
                'birth_date' => Carbon::parse('2005-08-10'),
                'age' => 17,
                'sex' => 'Female',
                'civil_status' => 'Single',
                'address' => '123 ABC Street, Cityville',
                'mobile_number' => '0935-765-0839',
                'contact_person' => 'Ligaya Scovgachn',
                'contact_person_number' => '0987-654-3210',
            ],
        ];
        foreach ($records as $key => $record) {
            Record::create($record);
        }
    }
}
