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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id('ID_Nilai');
            $table->unsignedBigInteger('ID_alternatif');
            $table->unsignedBigInteger('ID_Kriteria');
            $table->double('nilai', 8, 2);
            $table->timestamps();
    
            $table->foreign('ID_alternatif')->references('ID_alternatif')->on('alternatif')->onDelete('cascade');
            $table->foreign('ID_Kriteria')->references('ID_Kriteria')->on('kriteria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
