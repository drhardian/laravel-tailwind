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
        Schema::create('item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('master_activity_code');
            $table->unsignedBigInteger('item_type_id');
            $table->string('size')->nullable();
            $table->string('class')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->foreign('master_activity_code')->references('id')->on('master_activity');
            $table->foreign('item_type_id')->references('id')->on('master_item_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};
