<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\AnggotaPKK;
use app\Models\KegiatanPKK;
use app\Models\KegiatanRW;
use app\Models\KeuanganRW;
use app\Models\KeuanganPKK;
use app\Models\MahasiswaKos;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        AnggotaPKK::factory(10)->create();
        KegiatanPKK::factory(10)->create();
        KegiatanRW::factory(10)->create();
        AnggotaPKK::factory(10)->create();
        MahasiswaKos::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
