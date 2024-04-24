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
        Schema::create('RW', function (Blueprint $table) {
            $table->id('ID_RW');
            $table->string('nama_Pengurus', 100);
            $table->string('jabatan_Pengurus', 100);
            $table->integer('nomor_RW');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('RW');
    }
};
