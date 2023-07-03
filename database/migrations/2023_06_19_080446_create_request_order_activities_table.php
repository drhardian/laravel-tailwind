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
        Schema::create('request_order_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_order_id');
            $table->unsignedBigInteger('activity_id');
            $table->timestamps();

            $table->foreign('request_order_id')->references('id')->on('request_orders')->onDelete('cascade');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_order_activities');
    }
};
