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
        Schema::create('input_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_type_id')->references('id')->on('data_types')->onDelete('cascade');
            $table->string('name');
            $table->string('type');
            $table->string('title');
            $table->string('validate')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_fields');
    }
};
