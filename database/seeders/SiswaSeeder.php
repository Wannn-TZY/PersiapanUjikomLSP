<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nis' => '1023011001',
                'nama_siswa' => 'Andi Saputra',
                'kelas_id' => 1,
                'password' => bcrypt('Andi12345')
            ],
            [
                'nis' => '1023011002',
                'nama_siswa' => 'Putri Lestari',
                'kelas_id' => 2,
                'password' => bcrypt('Putri12345')
            ],
        [
            'nis' => '1023011003',
            'nama_siswa' => 'Ridwan Adiansyah',
            'kelas_id' => 2,
            'password' => bcrypt('Ridwan12345')
        ]
        ];
        foreach ($data as $siswa) {
    Siswa::updateOrCreate(
        ['nis' => $siswa['nis']], 
        $siswa
    );
}

    }
}
