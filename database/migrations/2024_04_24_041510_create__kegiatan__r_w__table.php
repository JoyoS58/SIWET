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
        Schema::create('Kegiatan_RW', function (Blueprint $table) {
            $table->id('ID_Kegiatan_RW');
            $table->unsignedBigInteger('ID_RW');
            $table->string('nama_Kegiatan',100);
            $table->string('waktu',50);
            $table->date('tanggal');
            $table->string('tempat',100);
            $table->string('penanggung_Jawab',100);
            $table->text('dekripsi');
            $table->timestamps();

            $table->foreign('ID_RW')->references('ID_RW')->on('RW');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Kegiatan_RW');
    }
};
