<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Mahasiswa_Kos', function (Blueprint $table) {
            $table->id('NIK');
            $table->unsignedBigInteger('ID_RT');
            $table->string('nama', 100);
            $table->string('tempat_Tanggal_Lahir', 100);
            $table->string('alamat_Kos', 100);
            $table->string('jenis_Kelamin', 20);
            $table->string('agama', 50);
            $table->string('status', 20);
            $table->string('universitas', 100)->nullable();  // Optional field for Mahasiswa
            $table->string('jurusan', 100)->nullable();      // Optional field for Mahasiswa
            $table->string('wali', 100)->nullable();    // Optional field for Mahasiswa
            $table->string('pekerjaan', 100)->nullable();    // Optional field for Pekerja
            $table->string('alamatKerja', 100)->nullable();  // Optional field for Pekerja
            $table->timestamps();

            $table->foreign('ID_RT')->references('ID_RT')->on('RT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Mahasiswa_Kos');
    }
};

