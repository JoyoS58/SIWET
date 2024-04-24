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
        Schema::create('RT', function (Blueprint $table) {
            $table->id('ID_RT');
            $table->unsignedBigInteger('ID_RW');
            $table->string('ketua_RT',100);
            $table->string('sekretaris_RT',100);
            $table->string('bendahara_RT',100);
            $table->integer('nomor_RT');
            $table->timestamps();

            $table->foreign('ID_RW')->references('ID_RW')->on('RW');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('RT');
    }
};
