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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id('jadwal_id');
            $table->text('rapat_judul')->nullable();
            $table->text('rapat_deskripsi')->nullable();
            $table->text('rapat_ruangan')->nullable();
            $table->text('rapat_kode')->nullable();
            $table->text('rapat_waktu_mulai')->nullable();
            $table->text('rapat_waktu_selesai')->nullable();
            $table->date('rapat_tanggal')->nullable();
            $table->text('rapat_pimpinan_id')->nullable();
            $table->text('rapat_notulen_id')->nullable();
            $table->text('rapat_bidang_id')->nullable();
            $table->integer('rapat_status')->default(0);
            $table->text('file')->nullable();
            $table->integer('flag_erase')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
