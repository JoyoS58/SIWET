<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     DB::table('user')->insert([
    //         [
    //             'ID_RW' => 1,
    //             'nama' => 'Admin RW',
    //             'username' => 'adminrw',
    //             'password' => Hash::make('adminrw123'), // Password di-hash menggunakan Bcrypt
    //             'level' => 'adminrw'
    //         ],
    //         [
    //             'ID_RW' => 1,
    //             'nama' => 'Admin PKK',
    //             'username' => 'adminpkk',
    //             'password' => Hash::make('adminpkk123'), // Password di-hash menggunakan Bcrypt
    //             'level' => 'adminpkk'
    //         ]
    //     ]);
    // }
}
