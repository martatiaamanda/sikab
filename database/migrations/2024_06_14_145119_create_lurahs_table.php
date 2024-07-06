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
        Schema::create('lurah', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('NIP');
            $table->year('awal_jabatan');
            $table->year('akhir_jabatan');
            $table->string('tanda_tangan')->nullable();
            $table->string('stemple')->nullable();

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lurah');
    }
};
