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
        Schema::create('bansos', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_bansos')->nullable(true);
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('perihal')->default('Bantuan Sosial');
            $table->enum('status', ['diproses', 'diterima', 'ditolak'])->default('diproses');
            $table->date('tanggal_bansos')->default(date('Y-m-d'));
            $table->date('tanggal_disetujui')->nullable(true);
            $table->string('catatan')->nullable(true);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bansos');
    }
};
