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
        Schema::create('Warga', function (Blueprint $table) {
            $table->id('NIK');
            $table->unsignedBigInteger('ID_RT');
            $table->bigInteger('nomor_KK');
            $table->string('nama', 100);
            $table->string('tempat_Tanggal_Lahir', 100);
            $table->string('agama', 50);
            $table->string('alamat', 100);
            $table->string('pekerjaan', 50);
            $table->string('jenis_Kelamin', 20);
            $table->string('jenis_Penduduk', 30);
            $table->timestamps();

            $table->foreign('ID_RT')->references('ID_RT')->on('RT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Warga');
    }
};
