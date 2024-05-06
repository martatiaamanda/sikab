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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->nullable(true);
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('jenis_surat_id')->references('id')->on('jenis_surats')->onDelete('cascade');
            $table->enum('status', ['diproses', 'diterima', 'ditolak'])->default('diproses');
            $table->date('tanggal_surat')->default(date('Y-m-d'));
            $table->date('tanggal_disetujui')->nullable(true);
            $table->string('catatan')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
