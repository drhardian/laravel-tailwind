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
        Schema::create('costing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('contract_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('unit_rate_id');
            $table->double('price');
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('client');
            $table->foreign('contract_id')->references('id')->on('client_contract');
            $table->foreign('item_id')->references('id')->on('item');
            $table->foreign('unit_rate_id')->references('id')->on('unit_rate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costing');
    }
};
