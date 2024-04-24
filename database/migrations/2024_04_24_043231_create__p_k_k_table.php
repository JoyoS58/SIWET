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
        Schema::create('PKK', function (Blueprint $table) {
            $table->id('ID_Pengurus');
            $table->unsignedBigInteger('ID_RW');
            $table->string('nama_Pengurus',100);
            $table->string('jabatan',100);
            $table->timestamps();

            $table->foreign('ID_RW')->references('ID_RW')->on('RW');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PKK');
    }
};
