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
        Schema::create('rapat_dokumentasi', function (Blueprint $table) {
            $table->id('rapat_dokumentasi_id');
            $table->text('jadwal_id')->nullable();
            $table->text('file')->nullable();
            $table->text('nama_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapat_dokumentasi');
    }
};
