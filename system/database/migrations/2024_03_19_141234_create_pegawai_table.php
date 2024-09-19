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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id('pegawai_id');
            $table->text('pegawai_nama')->nullable();
            $table->text('email')->nullable();
            $table->text('pegawai_wa')->nullable();
            $table->text('password')->nullable();
            $table->text('pegawai_nip')->nullable();
            $table->text('pegawai_jabatan')->nullable();
            $table->text('pegawai_tingkat')->nullable();
            $table->text('pegawai_status')->nullable();
            $table->integer('pegawai_level')->default(1); //1 biasa 2, operator
            $table->integer('pegawai_bidang')->default(1);
            $table->integer('flag_erase')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
