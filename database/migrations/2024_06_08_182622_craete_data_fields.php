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
        //
        Schema::create('sub_input_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_type_id')->references('id')->on('data_types')->onDelete('cascade');
            // $table->string('field');
            $table->foreignId('input_type_id')->references('id')->on('input_fields')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('sub_input_fields');
    }
};
