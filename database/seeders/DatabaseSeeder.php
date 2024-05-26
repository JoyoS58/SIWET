<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use app\Models\RW;
use app\Models\PKK;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('RW')->insert([
            [
                'ID_RW' => 1,
                'nama_Pengurus' => 'Wari',
                'jabatan_Pengurus' => 'Ketua RW',
                'nomor_RW' => 10
            ],

        ]);
        DB::table('PKK')->insert([
            [
                'ID_Pengurus' => 1,
                'ID_RW' => 1,
                'nama_Pengurus' => 'Wari',
                'jabatan' => 'Ketua PKK'
            ]
        ]);
        DB::table('user')->insert([
            [
                'ID_RW' => 1,
                'nama' => 'Admin RW',
                'username' => 'adminrw',
                'password' => Hash::make('adminrw123'), // Password di-hash menggunakan Bcrypt
                'level' => 'adminrw'
            ],
            [
                'ID_RW' => 1,
                'nama' => 'Admin PKK',
                'username' => 'adminpkk',
                'password' => Hash::make('adminpkk123'), // Password di-hash menggunakan Bcrypt
                'level' => 'adminpkk'
            ]
        ]);
    }
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
}
