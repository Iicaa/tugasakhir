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
        Schema::create('peserta', function (Blueprint $table) {
            $table->id('peserta_id');
            $table->text('peserta_jadwal_id')->nullable();
            $table->text('peserta_pegawai_id')->nullable();
            $table->text('peserta_email')->nullable();
            $table->text('kode_rapat')->nullable();
            $table->text('pegawai_nama')->nullable();
            $table->integer('status_notulensi')->default(0);
            $table->integer('status_kehadiran')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta');
    }
};
