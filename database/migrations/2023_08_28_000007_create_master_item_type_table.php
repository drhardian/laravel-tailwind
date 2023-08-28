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
        Schema::create('master_item_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id');
            $table->string('type_name');
            $table->timestamps();
            $table->foreign('activity_id')->references('id')->on('master_activity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_item_type');
    }
};
