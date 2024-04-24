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
        Schema::create('Anggota_PKK', function (Blueprint $table) {
            $table->id('ID_Anggota');
            $table->unsignedBigInteger('ID_Pengurus');
            $table->string('nama',100);
            $table->string('jabatan',50);
            $table->string('nomor_Telepon',20);
            $table->timestamps();

            $table->foreign('ID_Pengurus')->references('ID_Pengurus')->on('PKK');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Anggota_PKK');
    }
};
