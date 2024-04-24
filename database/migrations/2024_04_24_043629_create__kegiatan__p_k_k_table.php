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
        Schema::create('Kegiatan_PKK', function (Blueprint $table) {
            $table->id('ID_Kegiatan');
            $table->unsignedBigInteger('ID_Pengurus');
            $table->string('nama_Kegiatan',100);
            $table->string('waktu',30);
            $table->date('tanggal');
            $table->string('tempat',100);
            $table->string('penanggung_Jawab',100);
            $table->text('deskripsi');
            $table->timestamps();

            $table->foreign('ID_Pengurus')->references('ID_Pengurus')->on('PKK');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Kegiatan_PKK');
    }
};
