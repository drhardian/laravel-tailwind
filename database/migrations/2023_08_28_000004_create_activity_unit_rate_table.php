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
        Schema::create('activity_unit_rate', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_rate_id');
            $table->unsignedBigInteger('activity_code');
            $table->timestamps();
            $table->foreign('unit_rate_id')->references('id')->on('unit_rate');
            $table->foreign('activity_code')->references('id')->on('master_activity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_unit_rate');
    }
};
