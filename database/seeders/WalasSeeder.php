<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Walas;

class WalasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nig' => '111111',
                'nama_walas' => 'Budi Santoso',
                'kelas_id' => 1,
                'password' => bcrypt('Budi12345')
            ],
            [
                'nig' => '111112',
                'nama_walas' => 'Siti Aminah',
                'kelas_id' => 2,
                'password' => bcrypt('Siti12345')
            ],
        ];
        foreach($data as $walas ){
            Walas::create($walas);
        }
    }
}
