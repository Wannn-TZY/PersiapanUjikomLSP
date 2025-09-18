<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create(['nama_kelas' => 'XII RPL 1']);
        Kelas::create(['nama_kelas' => 'XII RPL 2']);
        Kelas::create(['nama_kelas' => 'XI RPL 1']);
        Kelas::create(['nama_kelas' => 'XI RPL 2']);
        Kelas::create(['nama_kelas' => 'X RPL 1']);
        Kelas::create(['nama_kelas' => 'X RPL 2']);
    }
}
