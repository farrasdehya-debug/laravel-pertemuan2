<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswas = [
            [
                'nim' => '12345678910',
                'nama' => 'Farras Dehya',
                'prodi' => 'Sistem Informasi',
                'kampus' => 'Universitas Pamulang',
                'email' => 'farras.dehya@gmail.com',
                'status' => 'aktif',
            ],
        ];

        foreach ($mahasiswas as $mahasiswa) {
            Mahasiswa::create($mahasiswa);
        }
    }
}

