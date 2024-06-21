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
        Schema::create('data_bansos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bansos_id')->references('id')->on('bansos')->onDelete('cascade');
            $table->string('nama');
            $table->string('alamat');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('nama_ibu');
            $table->string('umur_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('alamat_ibu');
            $table->string('nama_ayah');
            $table->string('umur_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('alamat_ayah');
            $table->string('kk');
            $table->string('ktp');
            $table->string('sktm');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_bansos');
    }
};
