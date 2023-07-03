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
        Schema::create('request_order_costings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_order_id');
            $table->unsignedBigInteger('costing_id');
            $table->integer('quantity');
            $table->decimal('unit_price', 18, 2);
            $table->decimal('sub_total', 18, 2);
            $table->timestamps();

            $table->foreign('request_order_id')->references('id')->on('request_orders')->onDelete('cascade');
            $table->foreign('costing_id')->references('id')->on('client_contract_costings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_order_costings');
    }
};
