<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use app\Models\RW;
use app\Models\PKK;

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
    }
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
}
