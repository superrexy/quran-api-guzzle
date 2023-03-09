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
        Schema::create('quran', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('nama');
            $table->string('nama_latin');
            $table->string('jumlah_ayat');
            $table->string('tempat_turun');
            $table->text('arti');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quran');
    }
};
