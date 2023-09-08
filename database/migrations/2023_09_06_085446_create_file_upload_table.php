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
        Schema::create('file_upload', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reference_id');
            $table->string('name');
            $table->string('path');
            $table->string('size');
            $table->string('type');
            $table->string('prefix');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_upload');
    }
};
