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
        Schema::create('input_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('input_field_id')->references('id')->on('input_fields')->onDelete('cascade');
            // $table->string('field');
            $table->string('value')->nullable(true);
            $table->foreignId('surat_id')->references('id')->on('surats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_values');
    }
};
