<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate([
            'email' => 'admin@arraya.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('password'),
        ]);

        //Tambah Mitra Default
        $this->call([
            MitraSeeder::class,
        ]);
    }
}
