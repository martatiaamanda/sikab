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
        Schema::create('sub_surat_pindahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_pindah_id')->references('id')->on('surat_pindahs')->onDelete('cascade');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('hubungan');
            $table->string('keterangan');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_surat_pindahs');
    }
};
