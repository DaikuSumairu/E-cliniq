<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inventory;

class InventoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inventories=[
            [
                'name' => 'Biogesic',
                'dosage' => '20',
                'quantity' => 480,
            ],
            [
                'name' => 'Decolgen',
                'dosage' => '12',
                'quantity' => 780,
            ],
            [
                'name' => 'Tuseran',
                'dosage' => '10',
                'quantity' => 500,
            ],
            [
                'name' => 'Isodril',
                'dosage' => '15',
                'quantity' => 610,
            ],
            [
                'name' => 'Neobloc',
                'dosage' => '50',
                'quantity' => 120,
            ],
            [
                'name' => 'Sinutab',
                'dosage' => '15',
                'quantity' => 623,
            ],
            [
                'name' => 'Serc',
                'dosage' => '16',
                'quantity' => 200,
            ],
            [
                'name' => 'Bioflu',
                'dosage' => '20',
                'quantity' => 320,
            ],
            [
                'name' => 'Feldene Flash',
                'dosage' => '8',
                'quantity' => 223,
            ],
            [
                'name' => 'Neozep',
                'dosage' => '22',
                'quantity' => 330,
            ],
            [
                'name' => 'Calcibloc',
                'dosage' => '10',
                'quantity' => 120,
            ],
            [
                'name' => 'Mefenamic Acid',
                'dosage' => '12',
                'quantity' => 500,
            ],
            [
                'name' => 'Dizitab',
                'dosage' => '25',
                'quantity' => 250,
            ],
            [
                'name' => 'Kremil S',
                'dosage' => '25',
                'quantity' => 251,
            ],
            [
                'name' => 'Omeprazole',
                'dosage' => '13',
                'quantity' => 133,
            ],
            [
                'name' => 'Sinupret',
                'dosage' => '12',
                'quantity' => 150,
            ],
            [
                'name' => 'Catapress',
                'dosage' => '.75',
                'quantity' => 80,
            ],
            [
                'name' => 'Catopril',
                'dosage' => '25',
                'quantity' => 30,
            ],
            [
                'name' => 'Ambroxol',
                'dosage' => '30',
                'quantity' => 303,
            ],
            [
                'name' => 'Telfast',
                'dosage' => '18',
                'quantity' => 184,
            ],
            [
                'name' => 'Alerta',
                'dosage' => '12',
                'quantity' => 220,
            ],
            [
                'name' => 'Alnix',
                'dosage' => '3',
                'quantity' => 38,
            ],
            [
                'name' => 'Cetirizine',
                'dosage' => '13',
                'quantity' => 121,
            ],
            [
                'name' => 'Buscopan',
                'dosage' => '9',
                'quantity' => 75,
            ],
            [
                'name' => 'Buscopan Venus',
                'dosage' => '12',
                'quantity' => 33,
            ],
            [
                'name' => 'Sambong',
                'dosage' => '20',
                'quantity' => 44,
            ],
            [
                'name' => 'Benadryl',
                'dosage' => '10',
                'quantity' => 88,
            ],
            [
                'name' => 'Alaxan FR',
                'dosage' => '25',
                'quantity' => 81,
            ],
            [
                'name' => 'Symdex D',
                'dosage' => '5',
                'quantity' => 50,
            ],
            [
                'name' => 'Loperamide',
                'dosage' => '13',
                'quantity' => 410,
            ],
            [
                'name' => 'Plasil',
                'dosage' => '10',
                'quantity' => 42,
            ],
            [
                'name' => 'Midol',
                'dosage' => '10',
                'quantity' => 79,
            ],
            [
                'name' => 'Advil',
                'dosage' => '14',
                'quantity' => 210,
            ],
            [
                'name' => 'Carbocisteine',
                'dosage' => '16',
                'quantity' => 22,
            ],
            [
                'name' => 'Ascof',
                'dosage' => '10',
                'quantity' => 300,
            ],
            [
                'name' => 'Salbutamol',
                'dosage' => '12',
                'quantity' => 12,
            ],
            [
                'name' => 'Ventolin Nebule',
                'dosage' => '25',
                'quantity' => 33,
            ],
            [
                'name' => 'Dequadine',
                'dosage' => '11',
                'quantity' => 60,
            ],
            [
                'name' => 'Sinecod',
                'dosage' => '14',
                'quantity' => 40,
            ],
            [
                'name' => 'Hydrite',
                'dosage' => '30',
                'quantity' => 66,
            ],
            [
                'name' => 'Band-Aid Visine',
                'dosage' => '0',
                'quantity' => 57,
            ],
            [
                'name' => 'Antigen Test Kit',
                'dosage' => '0',
                'quantity' => 123,
            ],
            [
                'name' => 'Salonpas',
                'dosage' => '0',
                'quantity' => 72,
            ],
            [
                'name' => 'Omega Pain Killer',
                'dosage' => '20',
                'quantity' => 34,
            ],
            [
                'name' => 'Bactidol',
                'dosage' => '120',
                'quantity' => 12,
            ],
            [
                'name' => 'Betadine',
                'dosage' => '100',
                'quantity' => 18,
            ],
            [
                'name' => 'Dequadin',
                'dosage' => '100',
                'quantity' => 8,
            ],
            [
                'name' => 'Cotton',
                'dosage' => '0',
                'quantity' => 20,
            ],
            [
                'name' => 'Cotton Buds',
                'dosage' => '0',
                'quantity' => 42,
            ],
            [
                'name' => 'Transpore',
                'dosage' => '0',
                'quantity' => 20,
            ],
            [
                'name' => 'Mediplast',
                'dosage' => '0',
                'quantity' => 60,
            ],
            [
                'name' => 'Sure-Guard',
                'dosage' => '0',
                'quantity' => 41,
            ],
            [
                'name' => 'Bactifree',
                'dosage' => '5000',
                'quantity' => 5,
            ],
            [
                'name' => 'Cutasept',
                'dosage' => '250',
                'quantity' => 21,
            ],
            [
                'name' => 'Lancets',
                'dosage' => '0',
                'quantity' => 150,
            ],
            [
                'name' => 'Agua Oxigenada',
                'dosage' => '120',
                'quantity' => 6,
            ],
            [
                'name' => 'Alcohol',
                'dosage' => '120',
                'quantity' => 3,
            ],
        ];
        foreach ($inventories as $key => $inventories) {
            Inventory::create($inventories);
        }
    }
}
