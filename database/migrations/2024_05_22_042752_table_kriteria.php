<?php

use GuzzleHttp\Promise\Create;
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
        Schema::create('kriteria', function(Blueprint $table){
            $table->id('ID_Kriteria');
            $table->string('nama_Kriteria',100);
            $table->string('kode_Kriteria',100);
            $table->string('atribut',100);
            $table->double('bobot_Kriteria',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Kriteria');
    }
};
