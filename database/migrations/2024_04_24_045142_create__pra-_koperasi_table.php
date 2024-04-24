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
        Schema::create('Pra-Koperasi', function (Blueprint $table) {
            $table->id('ID_Penerima');
            $table->unsignedBigInteger('ID_Pengurus');
            $table->string('nama',100);
            $table->date('tanggal');
            $table->decimal('nominal',10,2);
            $table->timestamps();

            $table->foreign('ID_Pengurus')->references('ID_Pengurus')->on('PKK');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Pra-Koperasi');
    }
};
