<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mitra;

class MitraSeeder extends Seeder
{
    public function run()
    {
        Mitra::create([
            'kode_mitra'     => 'MTR001',
            'nama_depan'     => 'Ketua',
            'nama_belakang'  => 'Utama',
            'nama_sponsor'   => null,
            'kode_sponsor'   => null,
            'nik'            => '1234567890123456',
            'tempat_lahir'   => 'Mataram',
            'tanggal_lahir'  => '1980-01-01',
            'jenis_kelamin'  => 'Laki-laki',
            'alamat'         => 'Jl. Utama No.1',
            'no_hp'          => '081234567890',
            'foto'           => null,
        ]);
    }
}
