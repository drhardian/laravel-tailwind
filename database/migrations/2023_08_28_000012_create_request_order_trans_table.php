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
        Schema::create('request_order_trans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_order_id');
            $table->unsignedBigInteger('costing_id');
            $table->double('quantity');
            $table->double('unit_price');
            $table->double('sub_total');
            $table->timestamps();
            $table->foreign('request_order_id')->references('id')->on('request_order');
            $table->foreign('costing_id')->references('id')->on('costing');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_order_trans');
    }
};
