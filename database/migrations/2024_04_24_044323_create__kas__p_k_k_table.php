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
        Schema::create('Kas_PKK', function (Blueprint $table) {
            $table->id('ID_Transaksi');
            $table->unsignedBigInteger('ID_Pengurus');
            $table->decimal('nominal',10,2);
            $table->string('jenis_Transaksi',50);
            $table->date('tanggal');
            $table->decimal('saldo',10,2);
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
        Schema::dropIfExists('Kas_PKK');
    }
};
