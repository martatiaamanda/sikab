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
        Schema::create('surat_pindahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_id')->references('id')->on('surats')->onDelete('cascade');
            $table->foreignId('jenis_surat_id')->references('id')->on('jenis_surats')->onDelete('cascade');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('kewarganegaraan');
            $table->string('agama');
            $table->string('perkawinan');
            $table->string('pekerjaan');
            $table->string('pendidikan');
            $table->string('no_kk');
            $table->string('alamat_asal');
            $table->string('alamat_tujuan');
            $table->string('desa_tujuan');
            $table->string('kecamatan_tujuan');
            $table->string('kabupaten_tujuan');
            $table->string('provinsi_tujuan');
            $table->string('alasan_pindah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_pindahs');
    }
};
